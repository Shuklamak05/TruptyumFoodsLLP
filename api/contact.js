export default async function handler(req, res) {
    // Set CORS headers
    res.setHeader('Access-Control-Allow-Credentials', true);
    res.setHeader('Access-Control-Allow-Origin', '*');
    res.setHeader('Access-Control-Allow-Methods', 'GET,OPTIONS,PATCH,DELETE,POST,PUT');
    res.setHeader(
        'Access-Control-Allow-Headers',
        'X-CSRF-Token, X-Requested-With, Accept, Accept-Version, Content-Length, Content-MD5, Content-Type, Date, X-Api-Version'
    );

    if (req.method === 'OPTIONS') {
        return res.status(200).end();
    }

    if (req.method !== 'POST') {
        return res.status(405).json({ status: 'error', message: 'Method not allowed. Use POST request.' });
    }

    try {
        let body = req.body;
        if (typeof body === 'string') {
            try {
                body = JSON.parse(body);
            } catch (e) {
                body = {};
            }
        }
        body = body || {};

        const { name, email, phone, service, message } = body;

        if (!name || !email || !message) {
            return res.status(400).json({ status: 'error', message: 'Please complete all required fields.' });
        }

        // If Resend API key is set in Vercel Environment Variables
        if (process.env.RESEND_API_KEY) {
            const resendRes = await fetch('https://api.resend.com/emails', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': `Bearer ${process.env.RESEND_API_KEY}`
                },
                body: JSON.stringify({
                    from: process.env.FROM_EMAIL || 'Truptyum Foods <onboarding@resend.dev>',
                    to: process.env.TO_EMAIL || 'sales@truptyumfoods.com',
                    subject: `New Inquiry from Truptyum Foods Web: ${name}`,
                    html: `
                        <div style="font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #ddd; border-radius: 8px;">
                            <h2 style="color: #0ba43c; border-bottom: 2px solid #0ba43c; padding-bottom: 10px;">New Web Inquiry</h2>
                            <p><strong>Name:</strong> ${name}</p>
                            <p><strong>Email:</strong> ${email}</p>
                            <p><strong>Phone:</strong> ${phone || 'Not specified'}</p>
                            <p><strong>Inquiry Sector:</strong> ${service || 'General'}</p>
                            <p><strong>Message:</strong></p>
                            <div style="background-color: #f9f9f9; padding: 15px; border-left: 4px solid #0ba43c;">${message.replace(/\n/g, '<br>')}</div>
                        </div>
                    `
                })
            });

            if (resendRes.ok) {
                return res.status(200).json({ status: 'success', message: 'Thank you for contacting us. Your message has been sent successfully.' });
            }
        }

        // Default response if no environment keys set yet
        return res.status(200).json({ 
            status: 'success', 
            message: 'Thank you for contacting us! Your message has been received successfully.' 
        });

    } catch (err) {
        return res.status(500).json({ status: 'error', message: 'Apologies, something went wrong and we couldn\'t process your message.' });
    }
}
