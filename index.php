<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hire</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .job-tile {
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            transition: transform 0.2s;
        }
        .job-tile:hover {
            transform: scale(1.05);
        }
        .job-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
        }
        .job-category-title {
            font-size: 1.2em;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">Hire</div>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="jobseeker.php">Jobseekers</a></li>
                <li><a href="employer_signup.php">Employers</a></li>
                <li><a href="contact_us.php">Contact Us</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <div class="search-section">
            <h1>Search For Jobs !!!!</h1>
            <div class="user-type-buttons">
                <button onclick="window.location.href='jobseeker.php'">I'm a Jobseeker</button>
                <button onclick="window.location.href='employer_signup.php'">I'm an Employer</button>
            </div>
        </div>
        <section class="popular-categories">
            <h2>Popular Jobs Categories</h2>
            <div class="job-grid">
                <div class="job-tile">
                    <div class="job-category-title">Software Developer</div>
                    <p>Companies: Google, Microsoft, Amazon</p>
                </div>
                <div class="job-tile">
                    <div class="job-category-title">Graphic Designer</div>
                    <p>Companies: Adobe, Canva, Fiverr</p>
                </div>
                <div class="job-tile">
                    <div class="job-category-title">Data Scientist</div>
                    <p>Companies: IBM, Facebook, LinkedIn</p>
                </div>
                <div class="job-tile">
                    <div class="job-category-title">Marketing Specialist</div>
                    <p>Companies: HubSpot, Salesforce, Ogilvy</p>
                </div>
                <div class="job-tile">
                    <div class="job-category-title">Project Manager</div>
                    <p>Companies: Atlassian, Asana, Trello</p>
                </div>
                <div class="job-tile">
                    <div class="job-category-title">Sales Representative</div>
                    <p>Companies: Oracle, SAP, Zoom</p>
                </div>
                <div class="job-tile">
                    <div class="job-category-title">Customer Support</div>
                    <p>Companies: Zendesk, Freshdesk, Help Scout</p>
                </div>
                <div class="job-tile">
                    <div class="job-category-title">Content Writer</div>
                    <p>Companies: Medium, WordPress, BuzzFeed</p>
                </div>
                <div class="job-tile">
                    <div class="job-category-title">HR Specialist</div>
                    <p>Companies: Workday, BambooHR, ADP</p>
                </div>
                <div class="job-tile">
                    <div class="job-category-title">Financial Analyst</div>
                    <p>Companies: Goldman Sachs, JP Morgan, Morgan Stanley</p>
                </div>
            </div>
        </section>
    </main>
</body>
</html>
