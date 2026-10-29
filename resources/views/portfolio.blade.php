<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>My Portfolio | Developer</title>

    <meta name="description"
          content="My personal portfolio website">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="{{ asset('script.js') }}" defer></script>
</head>
<body>

    <!-- Navigation -->
    <header class="navbar">
        <a href="#home" class="logo">My<span>Portfolio.</span></a>

        <button class="menu-toggle"
                id="menu-toggle"
                aria-label="Toggle navigation"
                aria-expanded="false">
            ☰
        </button>

        <nav class="nav-links" id="nav-links">
            <a href="#home">Home</a>
            <a href="#about">About</a>
            <a href="#skills">Skills</a>
            <a href="#projects">Projects</a>
            <a href="#contact">Contact</a>
            <a href="{{route('admin.login')}}">Admin</a>
        </nav>
    </header>

    <main>

        <!-- Home Section -->
        <section id="home" class="hero section">
            <div class="hero-content">
                <p class="eyebrow">WELCOME TO MY PORTFOLIO</p>

                <h1>Hi, I'm <span>Sat Wai Lwin</span></h1>

                <h2>A Beginner Web Developer</h2>

                <p class="hero-description">
                    I am learning web development and building
                    creative websites using HTML, CSS, JavaScript,
                    PHP and Laravel.
                </p>

                <div class="hero-buttons">
                    <a href="#projects" class="btn btn-primary">
                        View My Projects
                    </a>

                    <a href="#contact" class="btn btn-outline">
                        Contact Me
                    </a>

                </div>
                

                
            </div>

            <div class="hero-visual">
                <div class="profile-circle">
                    <span>&lt;/&gt;</span>
                </div>

                <div class="floating-card">
                    <span class="code-icon">✦</span>
                    <div>
                        <strong>Creative Developer</strong>
                        <p>Learning every day</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- About Section -->
        <section id="about" class="section">
            <div class="section-heading">
                <p class="eyebrow">GET TO KNOW ME</p>
                <h2>About <span>Me</span></h2>
            </div>

            <div class="about-card">
                <div class="about-mark"></div>

                <div>
                    <h3>Hello! Nice to meet you.</h3>

                    <p>
                        My name is Sat Wai Lwin.
                        I am a beginner web developer I enjoys
                        learning programming and creating websites.
                        I am currently improving my skills in
                        frontend and backend development.
                    </p>

                    <p>
                        My goal is to become a skilled web developer
                        and build useful, user-friendly applications
                        using modern technologies.
                    </p>

                    <div class="about-details">
                        <p><strong>Focus:</strong> Web Development</p>
                        <p><strong>Learning:</strong> Laravel & PHP</p>
                        <p><strong>Goal:</strong> Full-Stack Developer</p>
                    </div>
                </div>
            </div>
            <a href="{{ asset('files/MY-CV.pdf') }}"
   class="btn btn-cv"
   download>
    <span>↓</span> Download My CV
</a>
        </section>

        <!-- Skills Section -->
<section id="skills" class="section">
    <div class="section-heading">
        <p class="eyebrow">WHAT I AM LEARNING</p>
        <h2>My <span>Skills</span></h2>
        <p>Technologies I use to build websites.</p>
    </div>

    <div class="skills-grid">
        @forelse ($skills as $skill)
            <article class="skill-card">
                <div class="skill-icon">
                    {{ strtoupper(substr($skill->name, 0, 1)) }}
                </div>

                <h3>{{ $skill->name }}</h3>

                <p>
                    {{ $skill->description ?: ($skill->category ?: 'Technology Skill') }}
                </p>
            </article>
        @empty
            <p>No skills added yet.</p>
        @endforelse
    </div>
</section>

        <!-- Projects Section -->
        
<section id="projects" class="projects-section">
    <div class="projects-heading">
        <h2>My <span>Projects</span></h2>
        <p>Some projects I have worked on or plan to build.</p>
    </div>

    <div class="projects-grid">
        @forelse($projects as $project)
            <article class="project-card">
                <div class="project-cover">
                    @if($project->image)
                        <img
                            src="{{ asset('storage/' . $project->image) }}"
                            alt="{{ $project->title }}"
                        >
                    @else
                        <div class="project-placeholder">
                            {{ $project->subtitle ?: $project->title }}
                        </div>
                    @endif
                </div>

                <div class="project-content">
                    <h3>{{ $project->title }}</h3>

                    @if($project->subtitle)
                        <h4>{{ $project->subtitle }}</h4>
                    @endif

                    <p>{{ $project->description }}</p>

                    @if($project->technologies)
                        <div class="project-tags">
                            @foreach(explode(',', $project->technologies) as $tech)
                                <span>{{ trim($tech) }}</span>
                            @endforeach
                        </div>
                    @endif

                    <div class="project-links">
                        @if($project->project_url)
                            <a href="{{ $project->project_url }}"
                               target="_blank"
                               rel="noopener noreferrer">
                                View Project ↗
                            </a>
                        @endif

                        @if($project->github_url)
                            <a href="{{ $project->github_url }}"
                               target="_blank"
                               rel="noopener noreferrer">
                                GitHub ↗
                            </a>
                        @endif
                    </div>
                </div>
            </article>
        @empty
            <p>No projects have been added yet.</p>
        @endforelse
    </div>
</section>

<style>
    .projects-section {
        padding: 50px 0;
    }

    .projects-heading {
        text-align: center;
        margin-bottom: 45px;
    }

    .projects-heading h2 {
        font-size: 42px;
        margin-bottom: 12px;
    }

    .projects-heading h2 span {
        color: #a78bfa;
    }

    .projects-heading p {
        color: #c4b5fd;
        line-height: 1.7;
    }

   .projects-grid {
    display: flex;
    gap: 24px;
    overflow-x: auto;
    overflow-y: hidden;
    padding: 10px 4px 20px;
    scroll-snap-type: x mandatory;
    scrollbar-width: thin;
    scrollbar-color: #7c3aed #171d38;
}
.project-card {
    flex: 0 0 380px;
    min-width: 0;
    scroll-snap-align: start;
}

   /* Laptop သေးသေးနဲ့ tablet */
/* Desktop Navbar */
.nav-links {
    display: flex;
    align-items: center;
    gap: 28px;
}

.nav-links a {
    color: var(--muted);
    font-size: 0.94rem;
    transition: color 0.25s;
}

.nav-links a:hover {
    color: var(--purple);
}

/* Mobile Menu Button */
.menu-toggle {
    display: none;
    background: transparent;
    color: white;
    border: 1px solid var(--border);
    border-radius: 8px;
    padding: 8px 12px;
    font-size: 22px;
    cursor: pointer;
    position: relative;
    z-index: 1002;
}

/* Mobile Screen */
@media (max-width: 700px) {
    .project-card {
        flex-basis: 300px;
    }

    .navbar {
        position: relative;
    }

    .menu-toggle {
        display: block;
    }

    .nav-links {
        display: none;
        flex-direction: column;
        align-items: stretch;
        gap: 0;
        position: absolute;
        top: 100%;
        left: 0;
        width: 100%;
        padding: 12px 20px;
        background: #0b1024;
        border: 1px solid var(--border);
        border-radius: 0 0 12px 12px;
        z-index: 1001;
    }

    .nav-links.active {
        display: flex;
    }

    .nav-links a {
        display: block;
        width: 100%;
        padding: 12px 0;
    }
}

    .project-card:hover {
        transform: translateY(-4px);
        border-color: #8b5cf6;
    }

    .project-cover {
        height: 165px;
        margin: 18px 18px 0;
        overflow: hidden;
        border-radius: 13px;
        background: linear-gradient(135deg, #38245b, #191832);
    }

    .project-cover img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .project-placeholder {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 15px;
        text-align: center;
        color: #c4b5fd;
        font-size: 20px;
        font-weight: bold;
    }

    .project-content {
        padding: 20px;
    }

    .project-content h3 {
        margin: 0 0 12px;
        font-size: 20px;
    }

    .project-content h4 {
        color: #c4b5fd;
        margin: 0 0 12px;
    }

    .project-content p {
        color: #b9bfdc;
        line-height: 1.8;
        overflow-wrap: anywhere;
    }

    .project-tags {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        margin: 18px 0;
    }

    .project-tags span {
        padding: 7px 10px;
        color: #c4b5fd;
        background: #211d3e;
        border: 1px solid #3b315f;
        border-radius: 7px;
        font-size: 12px;
    }

    .project-links {
        display: flex;
        flex-wrap: wrap;
        gap: 16px;
        margin-top: 20px;
    }

    .project-links a {
        color: #a78bfa;
        text-decoration: none;
        font-weight: bold;
    }

    .project-links a:hover {
        color: white;
    }

    @media (max-width: 900px) {
        .projects-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }

    @media (max-width: 600px) {
        .projects-grid {
            grid-template-columns: 1fr;
        }

        .projects-heading h2 {
            font-size: 32px;
        }
    }
</style>


        <!-- Contact Section -->
        
<section id="contact" class="section">
    <div class="section-heading">
        <p class="eyebrow">LET'S CONNECT</p>
        <h2>Contact <span>Me</span></h2>
        <p>Have a question? Send me a message.</p>
    </div>

    <div class="contact-layout">

        <!-- Left Side: Profile -->
        <div class="contact-profile">
            <div class="contact-photo">
                <img
                    src="{{ asset('images\myprofile.jpg') }}"
                    alt="My Profile Photo"
                >
            </div>

            <h3>Sat Wai Lwin</h3>
            <p class="profile-role">Beginner Web Developer</p>

            <p class="profile-description">
                Thank you for visiting my portfolio.
                Feel free to contact me or explore my work.
            </p>

            <a class="contact-social"
               href="mailto:satwailwin086@gmail.com">
                <span>✉</span>
                <span>
                    <small>Email</small>
                    <strong>satwailwin086@gmail.com</strong>
                </span>
            </a>

            <a class="contact-social"
               href="https://github.com/satwailwin086-eng6"
               target="_blank"
               rel="noopener noreferrer">
                <span>⌘</span>
                <span>
                    <small>GitHub</small>
                    <strong>Visit My Profile ↗</strong>
                </span>
            </a>
        </div>

        <!-- Right Side: Contact Form -->
        <div class="contact-card">

            @if (session('success'))
                <div class="success-message" role="status">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="error-message" role="alert">
                    Please correct the errors below.
                </div>
            @endif

            <form action="{{ route('contact.send') }}"
                  method="POST">
                @csrf

                <div class="form-group">
                    <label for="name">Your Name</label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        placeholder="Enter your name"
                        value="{{ old('name') }}"
                        maxlength="100"
                        required
                    >
                    @error('name')
                        <small class="field-error">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">Your Email</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        placeholder="Enter your email"
                        value="{{ old('email') }}"
                        maxlength="255"
                        required
                    >
                    @error('email')
                        <small class="field-error">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="message">Your Message</label>
                    <textarea
                        id="message"
                        name="message"
                        rows="5"
                        maxlength="2000"
                        placeholder="Write your message..."
                        required
                    >{{ old('message') }}</textarea>
                    @error('message')
                        <small class="field-error">{{ $message }}</small>
                    @enderror
                </div>

                <button type="submit"
                        class="btn btn-primary submit-btn">
                    Send Message →
                </button>
            </form>

            <p class="form-note">
                Feel free to send me a message.
            </p>
        </div>

    </div>
</section>

    </main>

    <!-- Footer -->
    <footer class="footer">
        <a href="#home" class="logo">My<span>Portfolio.</span></a>

        <p>Designed & built while learning web development.</p>

        <p class="copyright">
            © {{ date('Y') }} Ma Sat Wai Lwin. All rights reserved.
        </p>
    </footer>

</body>
</html>