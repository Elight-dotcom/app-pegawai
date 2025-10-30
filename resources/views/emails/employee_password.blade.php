<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Bergabung - Akun Karyawan Baru</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f3f4f6;
            padding: 20px;
            line-height: 1.6;
        }

        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .header {
            background: linear-gradient(135deg, #1f2937 0%, #374151 100%);
            padding: 40px 30px;
            text-align: center;
        }

        .header-icon {
            width: 80px;
            height: 80px;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            margin: 0 auto 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .header h1 {
            color: #ffffff;
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .header p {
            color: #d1d5db;
            font-size: 16px;
        }

        .content {
            padding: 40px 30px;
        }

        .greeting {
            font-size: 18px;
            color: #1f2937;
            margin-bottom: 20px;
            font-weight: 600;
        }

        .message {
            color: #4b5563;
            font-size: 15px;
            margin-bottom: 30px;
            line-height: 1.8;
        }

        .credentials-box {
            background: linear-gradient(135deg, #f9fafb 0%, #f3f4f6 100%);
            border: 2px solid #e5e7eb;
            border-radius: 10px;
            padding: 25px;
            margin: 30px 0;
        }

        .credentials-title {
            font-size: 16px;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .credential-item {
            display: flex;
            align-items: center;
            padding: 12px 0;
            border-bottom: 1px solid #e5e7eb;
        }

        .credential-item:last-child {
            border-bottom: none;
        }

        .credential-label {
            font-weight: 600;
            color: #6b7280;
            width: 100px;
            font-size: 14px;
        }

        .credential-value {
            color: #1f2937;
            font-size: 15px;
            flex: 1;
        }

        .password-value {
            background-color: #1f2937;
            color: #ffffff;
            padding: 8px 15px;
            border-radius: 6px;
            font-family: 'Courier New', monospace;
            font-weight: 700;
            font-size: 16px;
            letter-spacing: 1px;
        }

        .warning-box {
            background-color: #fef3c7;
            border-left: 4px solid #f59e0b;
            padding: 15px 20px;
            margin: 25px 0;
            border-radius: 6px;
        }

        .warning-box p {
            color: #92400e;
            font-size: 14px;
            margin: 0;
        }

        .warning-icon {
            display: inline-block;
            margin-right: 8px;
            font-weight: bold;
        }

        .cta-button {
            display: inline-block;
            background: linear-gradient(135deg, #1f2937 0%, #374151 100%);
            color: #ffffff;
            text-decoration: none;
            padding: 15px 35px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 16px;
            margin: 20px 0;
            text-align: center;
            transition: transform 0.2s;
        }

        .cta-button:hover {
            transform: translateY(-2px);
        }

        .steps {
            margin: 30px 0;
        }

        .step {
            display: flex;
            margin-bottom: 15px;
            align-items: start;
        }

        .step-number {
            background-color: #1f2937;
            color: #ffffff;
            width: 28px;
            height: 28px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 14px;
            margin-right: 12px;
            flex-shrink: 0;
        }

        .step-text {
            color: #4b5563;
            font-size: 14px;
            padding-top: 4px;
        }

        .footer {
            background-color: #f9fafb;
            padding: 30px;
            text-align: center;
            border-top: 1px solid #e5e7eb;
        }

        .footer-text {
            color: #6b7280;
            font-size: 14px;
            margin-bottom: 10px;
        }

        .footer-signature {
            color: #1f2937;
            font-weight: 600;
            font-size: 15px;
            margin-bottom: 20px;
        }

        .footer-links {
            margin-top: 20px;
        }

        .footer-link {
            color: #4b5563;
            text-decoration: none;
            font-size: 13px;
            margin: 0 10px;
        }

        .divider {
            height: 1px;
            background-color: #e5e7eb;
            margin: 25px 0;
        }

        @media only screen and (max-width: 600px) {
            body {
                padding: 10px;
            }

            .header {
                padding: 30px 20px;
            }

            .header h1 {
                font-size: 24px;
            }

            .content {
                padding: 30px 20px;
            }

            .credentials-box {
                padding: 20px;
            }

            .credential-item {
                flex-direction: column;
                align-items: flex-start;
                gap: 8px;
            }

            .credential-label {
                width: 100%;
            }

            .cta-button {
                display: block;
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <div class="email-container">
        <!-- Header -->
        <div class="header">
            <div class="header-icon">
                <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2">
                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                    <circle cx="12" cy="7" r="4"></circle>
                </svg>
            </div>
            <h1>Selamat Bergabung! 🎉</h1>
            <p>Akun Karyawan Anda Telah Dibuat</p>
        </div>

        <!-- Content -->
        <div class="content">
            <p class="greeting">Halo, {{ $employee->nama_lengkap }}!</p>

            <p class="message">
                Kami dengan senang hati menyambut Anda sebagai bagian dari tim kami. Akun karyawan Anda telah berhasil dibuat dan siap untuk digunakan.
            </p>

            <!-- Credentials Box -->
            <div class="credentials-box">
                <div class="credentials-title">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                        <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                    </svg>
                    Informasi Akun Anda
                </div>

                <div class="credential-item">
                    <span class="credential-label">Email:</span>
                    <span class="credential-value">{{ $employee->email }}</span>
                </div>

                <div class="credential-item">
                    <span class="credential-label">Password:</span>
                    <span class="credential-value">
                        <span class="password-value">{{ $password }}</span>
                    </span>
                </div>
            </div>

            <!-- Warning Box -->
            <div class="warning-box">
                <p>
                    <span class="warning-icon">⚠️</span>
                    <strong>Penting:</strong> Demi keamanan akun Anda, harap segera ubah password setelah login pertama kali.
                </p>
            </div>

            <!-- Steps -->
            <div class="steps">
                <h3 style="color: #1f2937; margin-bottom: 15px; font-size: 16px;">Langkah Selanjutnya:</h3>

                <div class="step">
                    <div class="step-number">1</div>
                    <div class="step-text">Klik tombol "Login Sekarang" di bawah atau akses sistem melalui link yang tersedia</div>
                </div>

                <div class="step">
                    <div class="step-number">2</div>
                    <div class="step-text">Masukkan email dan password yang tertera di atas</div>
                </div>

                <div class="step">
                    <div class="step-number">3</div>
                    <div class="step-text">Ubah password Anda di menu pengaturan akun</div>
                </div>

                <div class="step">
                    <div class="step-number">4</div>
                    <div class="step-text">Lengkapi profil Anda dan mulai bekerja dengan tim</div>
                </div>
            </div>

            <!-- CTA Button -->
            <center>
                <a href="{{ url('/login') }}" class="cta-button">
                    Login Sekarang →
                </a>
            </center>

            <div class="divider"></div>

            <p class="message" style="margin-bottom: 10px;">
                Jika Anda memiliki pertanyaan atau mengalami kesulitan dalam mengakses akun, jangan ragu untuk menghubungi tim HR kami.
            </p>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p class="footer-signature">Salam Hangat,<br><strong>HR Department</strong></p>

            <p class="footer-text">
                Email ini dikirim secara otomatis, mohon tidak membalas email ini.
            </p>

            <p class="footer-text" style="margin-top: 20px; font-size: 12px;">
                © {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
            </p>
        </div>
    </div>
</body>

</html>