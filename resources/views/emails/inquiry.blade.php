<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>New Enterprise Inquiry</title>
</head>
<body style="font-family: sans-serif; line-height: 1.6; color: #333; max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #eee; border-radius: 8px;">
    <h2 style="color: #2563eb; border-bottom: 2px solid #2563eb; padding-bottom: 10px; margin-top: 0;">New Enterprise Inquiry</h2>
    <p>A visitor has submitted a new inquiry form on <strong>reliancesolutions.co.tz</strong>.</p>
    
    <table style="width: 100%; border-collapse: collapse; margin: 20px 0;">
        <tr>
            <td style="padding: 10px; border-bottom: 1px solid #eee; font-weight: bold; width: 35%;">Full Name:</td>
            <td style="padding: 10px; border-bottom: 1px solid #eee;">{{ $submission->name }}</td>
        </tr>
        <tr>
            <td style="padding: 10px; border-bottom: 1px solid #eee; font-weight: bold;">Company / Org:</td>
            <td style="padding: 10px; border-bottom: 1px solid #eee;">{{ $submission->company }}</td>
        </tr>
        <tr>
            <td style="padding: 10px; border-bottom: 1px solid #eee; font-weight: bold;">Email Address:</td>
            <td style="padding: 10px; border-bottom: 1px solid #eee;"><a href="mailto:{{ $submission->email }}">{{ $submission->email }}</a></td>
        </tr>
        <tr>
            <td style="padding: 10px; border-bottom: 1px solid #eee; font-weight: bold;">Phone Number:</td>
            <td style="padding: 10px; border-bottom: 1px solid #eee;">{{ $submission->phone }}</td>
        </tr>
        <tr>
            <td style="padding: 10px; border-bottom: 1px solid #eee; font-weight: bold;">Service Required:</td>
            <td style="padding: 10px; border-bottom: 1px solid #eee;">{{ $submission->service }}</td>
        </tr>
    </table>
    
    <div style="background-color: #f8fafc; padding: 15px; border-radius: 6px; border: 1px solid #e2e8f0; margin-top: 20px;">
        <h4 style="margin-top: 0; margin-bottom: 10px; color: #475569;">Inquiry Message:</h4>
        <p style="margin: 0; white-space: pre-wrap;">{{ $submission->message }}</p>
    </div>
    
    <p style="margin-top: 30px; font-size: 11px; color: #94a3b8; border-top: 1px solid #eee; padding-top: 10px; text-align: center;">
        This alert was generated automatically by the Reliance Solutions application.
    </p>
</body>
</html>
