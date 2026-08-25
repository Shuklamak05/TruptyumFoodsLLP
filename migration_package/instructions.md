# Truptyum Foods Website Migration Blueprint

This migration package has been prepared by a Senior Developer to facilitate the transfer of all website content, media, configurations, and metadata from the legacy codebase to a new, modern, and SEO-optimized website.

---

## 📂 Migration Package Structure
All necessary data from the codebase has been compiled into this directory:
- **`media_assets/`**: Contains the full folder structure of media uploads (images, PDFs, SVGs) organized by year/month.
- **`theme_assets/`**: Copy of the `leblix` parent theme and `leblix-child` theme for layout, styling, and custom code reference.
- **`custom_fields_and_data/`**:
  - [acf_schema.md](file:///Users/mac/Desktop/MAYANK/Truptyumfoods/migration_package/custom_fields_and_data/acf_schema.md): Full blueprint of Advanced Custom Fields (ACF) schemas (labels, names, and field types).
  - [cpt_schema.md](file:///Users/mac/Desktop/MAYANK/Truptyumfoods/migration_package/custom_fields_and_data/cpt_schema.md): Custom Post Type (CPT) names, supported features, and SEO slug routing.

---

## 🛠️ Source System Analysis

### 1. Core Architecture
- **Platform**: WordPress (Legacy)
- **Active Theme**: `leblix` (Leblix Multi-Purpose Theme) with custom plugin support.
- **Page Builder**: Elementor Page Builder (Layout configurations are stored as serialized JSON strings inside the database's `tf_postmeta` table under the meta key `_elementor_data`).
- **Sliders**: Slider Revolution (RevSlider) - slide layouts, transitions, and media references.

### 2. Database Metadata (from `wp-config.php`)
- **Database Name**: `truptyumfoods_live24`
- **Table Prefix**: `tf_` (e.g., `tf_posts`, `tf_postmeta`, `tf_users`)
- **Character Set**: `utf8mb4`

### 3. Core Plugins & Content Managers
- **Advanced Custom Fields (ACF)**: Manages metadata for team members, portfolios, testimonials, and general settings.
- **Leblix Addons**: Defines custom post types (`cspt-portfolio`, `cspt-service`, `cspt-team-member`, `cspt-testimonial`, `cspt-client`).
- **Contact Form 7 & Contact Form CFDB7**: Manages forms and database submissions.
- **Mailchimp for WordPress (MC4WP)**: Handles newsletter subscriptions.

---

## 📈 SEO & Migration Strategy

To ensure zero SEO rankings loss and a boost in performance, follow these guidelines:

### 1. Preserve URL Slugs (Redirects / Custom Routes)
Ensure the URL structure for custom post types remains identical. If URLs must change, establish 301 redirects immediately:
*   **Services**: `/cspt-service/[post-name]`
*   **Portfolio**: `/cspt-portfolio/[post-name]`
*   **Team Members**: `/cspt-team-member/[post-name]`
*   **Clients**: `/client/[post-name]`
*   **Standard Pages**: `/[post-name]` (e.g., `/about-us/`, `/contact-us/`, `/faq/`)

### 2. Technology Recommendation for the New Site
To build an SEO-enabled, highly performant website, choose one of these routes:
*   **Headless CMS + Static Generator (Recommended)**: Next.js or Astro frontend using WordPress as a headless CMS (via WP GraphQL or WP REST API) or a lighter CMS like Strapi. This yields near-instant page load speeds, which is a major Google ranking factor.
*   **Clean WordPress with Block Editor**: Rebuild using WordPress block editor (Gutenberg) instead of Elementor. Elementor introduces code bloat (nested divs and heavy scripts) that degrades page speeds. Using Gutenberg + ACF yields clean, crawlable HTML.

### 3. Media & Performance Enhancements
- Keep filenames exactly as they are in the `media_assets/` folder to prevent broken image references and preserve Google Image Search indexation.
- Convert JPEG/PNG images to modern **WebP** formats.
- Maintain `alt` tags and descriptive captions for food products, nutraceuticals, and cold rooms.

---

## 📋 Step-by-Step Migration Execution Plan

### Step 1: Database Extraction (Live Site Access Needed)
Since this codebase represents only the files, you must fetch the database from the live server.
1. Access your web hosting control panel (cPanel, Plesk, etc.) or connect to the database via SSH.
2. Run a MySQL dump for database `truptyumfoods_live24` using the table prefix `tf_`:
   ```bash
   mysqldump -u truptyumfoods_user24 -p truptyumfoods_live24 > truptyumfoods_backup.sql
   ```

### Step 2: Content Parsing (WordPress to Headless/New Site)
- **If migrating to another WordPress site**:
  Use the *All-in-One WP Migration* tool (the plugin `ai1wm` is active on this site) to export a `.wpress` file from the live administration panel, and import it into the clean destination site.
- **If migrating to a non-WordPress stack (e.g., Next.js, Gatsby, Shopify, Custom)**:
  Use a script (or a WP plugin like *WP All Export*) to convert `tf_posts` and `tf_postmeta` (filtered by post types `cspt-service`, `cspt-portfolio`, `post`, `page`) into structured JSON/CSV files. Use the schema definitions in the `custom_fields_and_data` directory to map the custom fields.

### Step 3: Reconstruct Layouts & Components
1. Re-register the custom fields using the schemas in `acf_schema.md`.
2. Map fields to the appropriate React/Astro/HTML templates.
3. Import the assets from the `media_assets/` directory to your new media library or CDN.

### Step 4: Verification & Launch
1. Audit all links with a tool like Screaming Frog to verify status codes.
2. Verify all `title` tags, `meta descriptions`, and `h1`-`h6` heading hierarchies.
3. Submit the updated XML sitemap to Google Search Console.
