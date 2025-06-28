<!-- resources/views/resume.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Qasim Nadeem - Web Application Engineer</title>
    <style>
        /* General Styles */
        body { font-family: Arial, sans-serif; margin: 0; padding: 20px; background-color: #f4f7f9; }
        header { background-color: #005f73; color: #fff; padding: 20px; border-radius: 6px; }
        header h1 { margin: 0; font-size: 2em; color: white}
        header p { margin: 5px 0; color:white}
        .section { margin-top: 20px; background-color: #fff; border-left: 4px solid #0a9396; padding: 15px; border-radius: 4px; }
        .section h2 { margin: 0 0 10px; color: #0a9396; font-size: 1.4em; }
        .subsection { margin-top: 10px; }
        .subsection h3 { margin: 0; color: #001219; font-size: 1.2em; }
        ul { margin: 5px 0 0 20px; padding: 0; }
        p, li { line-height: 1.5; color: #333; }
        .contact-info { font-size: 0.9em; }

        /* Print Styles for PDF via Browsershot */
        @media print {
            body { background-color: #ffffff; margin: 0; padding: 0; }
            header { background-color: #005f73 !important; -webkit-print-color-adjust: exact; print-color-adjust: exact; }
            .section { background-color: #ffffff !important; -webkit-print-color-adjust: exact; print-color-adjust: exact; }
            /* Prevent section breaks across pages */
            .section, .subsection {
                page-break-inside: avoid;
                break-inside: avoid-column;
                -webkit-column-break-inside: avoid;
            }
        }

        /* Remove default page margins */
        @page {
            margin: 5 10 10 5;
        }
    </style>
</head>
<body>
    <header>
        <h1>QASIM NADEEM</h1>
        <p>Web Application Engineer - LAMP Stack</p>
        <p class="contact-info">qqnadeem@gmail.com | +966535879703 | https://qasim-nadeem.com | Saudi Arabia</p>
    </header>

    <div class="section">
        <h2>Professional Summary</h2>
        <p>I am a Senior Backend Engineer with more than six years of experience. I excel in the design, implementation, and optimization of backend systems. I have a proven track record of leading technical initiatives and mentoring junior developers, coupled with a robust understanding of RESTful APIs, authentication and authorization mechanisms, and security best practices. My expertise encompasses PHP, Laravel, Node.js, AWS, Google Cloud, Azure, and database optimization. Furthermore, I possess exceptional communication and interpersonal skills, allowing me to work effectively within a collaborative team environment.</p>
    </div>

    <div class="section">
        <h2>Experience</h2>
        <div class="subsection">
            <h3>Senior Web Engineer, Modern Technology Company</h3>
            <p>Saudi Arabia, Riyadh | Feb 2023 - Present</p>
            <ul>
                <li>Developed scalable backend systems, supporting 50K+ users and 1K+ transactions/sec, leveraging Microservices and event-driven architecture.</li>
                <li>Implemented new features that boosted performance by 5% and sped up delivery by 10% through automation.</li>
                <li>Mentored 3 junior developers, enhancing code quality by 20% and cutting onboarding time by 50%.</li>
                <li>Conducted 100+ code reviews, reducing bugs by 30% and improving maintainability by 20%.</li>
                <li>Collaborated with product managers to deliver technical solutions, increasing user satisfaction by 30%.</li>
            </ul>
        </div>
        <div class="subsection">
            <h3>Senior Backend Engineer, Contrive Solutions</h3>
            <p>Pakistan, Lahore | Jan 2018 - Jan 2023</p>
            <ul>
                <li>Developed backend systems using PHP, Laravel, and Symfony, ensuring high performance and scalability.</li>
                <li>Optimized database structures and executed migrations, improving query efficiency and data integrity.</li>
                <li>Designed and implemented RESTful APIs with security best practices.</li>
                <li>Deployed applications using AWS, Docker, and CI/CD pipelines.</li>
                <li>Led junior developers, fostering skill development and timely delivery.</li>
            </ul>
        </div>
        <div class="subsection">
            <h3>Software Engineer, Regexsoft</h3>
            <p>Pakistan | Oct 2017 – Jan 2018</p>
            <ul>
                <li>Developed web and mobile applications using Laravel, WordPress, and Ionic.</li>
                <li>Managed client communications and delivered project presentations.</li>
                <li>Promoted from Associate Software Engineer to Software Engineer based on exceptional performance.</li>
            </ul>
        </div>
    </div>

    <div class="section">
        <h2>Education</h2>
        <div class="subsection">
            <h3>Bachelor's in Computer Science, University of the Punjab</h3>
            <p>Pakistan | Jul 2013 – Aug 2017</p>
            <ul>
                <li>Object-Oriented Programming (OOP): Modular and reusable code design.</li>
                <li>System Architecture: Scalable and efficient system structures.</li>
                <li>Database Design: Robust architectures for integrity and efficiency.</li>
                <li>Data Structures & Algorithms: Solving complex problems efficiently.</li>
            </ul>
        </div>
    </div>

    <div class="section">
        <h2>Projects</h2>
        <div class="subsection">
            <h3>Islamic Markets (islamicmarkets.com)</h3>
            <p>PHP, Laravel, AWS, Docker, MySQL, Jenkins</p>
            <ul>
                <li>Developed a learning and investment platform with webinars, personalized news feeds, and course management.</li>
                <li>Built RESTful APIs with authentication, authorization, and security best practices.</li>
                <li>Improved system performance by 20%, enhancing user experience.</li>
            </ul>
        </div>
        <div class="subsection">
            <h3>Veva (vevacollect.com)</h3>
            <p>Laravel, Node.js, MySQL, GraphQL, AWS</p>
            <ul>
                <li>Back-end development for a project collaboration platform in the audio space.</li>
                <li>Implemented APIs for file version management, user accounts, and messaging.</li>
                <li>Optimized code for readability and maintainability.</li>
            </ul>
        </div>
    </div>

    <div class="section">
        <h2>Skills</h2>
        <p>PHP | Laravel | AWS | MySQL | PostgreSQL | MongoDB | REST API | Microservices | Docker | Jenkins | CI/CD | Linux</p>
    </div>

    <div class="section">
        <h2>Languages</h2>
        <p>English – Professional</p>
    </div>

    <div class="section">
        <h2>Social Media</h2>
        <p>LinkedIn: https://www.linkedin.com/in/theqasimnadeem</p>
        <p>GitHub: https://github.com/qasim-nadeem</p>
    </div>
</body>
</html>
