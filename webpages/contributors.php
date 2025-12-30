<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contributor Guide - Summer of Code</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">

    <!-- Phosphor Icons -->
    <script src="https://unpkg.com/@phosphor-icons/web"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Roboto', 'sans-serif'],
                    },
                    colors: {
                        'gsoc-blue': '#4285F4',
                        'gsoc-red': '#EA4335',
                        'gsoc-yellow': '#FBBC04',
                        'gsoc-green': '#34A853',
                        'gsoc-bg': '#F8F9FA',
                    }
                }
            }
        }
    </script>

    <style>
        html {
            scroll-behavior: smooth;
            scroll-padding-top: 140px;
            /* Increased offset for mobile headers */
        }

        @media (min-width: 1024px) {
            html {
                scroll-padding-top: 100px;
                /* Standard offset for desktop */
            }
        }

        /* Sticky Sidebar logic */
        .sidebar-sticky {
            position: -webkit-sticky;
            position: sticky;
            top: 6rem;
            /* Height of navbar + gap */
            max-height: calc(100vh - 6rem);
            overflow-y: auto;
        }

        /* Active link styling for sidebar */
        .sidebar-link:hover {
            color: #4285F4;
            border-left-color: #4285F4;
            background-color: #eff6ff;
        }

        /* Typography for documentation content */
        .prose h2 {
            font-size: 1.5rem;
            font-weight: 700;
            color: #1f2937;
            margin-top: 2rem;
            margin-bottom: 1rem;
            padding-bottom: 0.5rem;
            border-bottom: 1px solid #e5e7eb;
        }

        @media (min-width: 768px) {
            .prose h2 {
                font-size: 1.875rem;
                margin-top: 2.5rem;
            }
        }

        .prose h3 {
            font-size: 1.25rem;
            font-weight: 600;
            color: #374151;
            margin-top: 1.5rem;
            margin-bottom: 0.75rem;
        }

        @media (min-width: 768px) {
            .prose h3 {
                font-size: 1.5rem;
                margin-top: 2rem;
            }
        }

        .prose p {
            margin-bottom: 1.25rem;
            line-height: 1.75;
            color: #4b5563;
        }

        .prose ul {
            list-style-type: disc;
            padding-left: 1.5rem;
            margin-bottom: 1.25rem;
            color: #4b5563;
        }

        .prose li {
            margin-bottom: 0.5rem;
        }

        .prose a {
            color: #4285F4;
            text-decoration: underline;
        }

        .prose a:hover {
            color: #1d4ed8;
        }
    </style>
</head>

<body class="font-sans text-gray-700 bg-gsoc-bg overflow-x-hidden flex flex-col min-h-screen">

    <!-- Navigation (Fixed) -->
    <nav class="bg-white shadow-sm fixed w-full z-50 h-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <!-- Logo Area -->
                <div class="flex items-center">
                    <a href="../index.html" class="flex-shrink-0 flex items-center gap-2 cursor-pointer group">
                        <div
                            class="w-10 h-10 bg-gsoc-blue rounded-full flex items-center justify-center text-white group-hover:bg-blue-600 transition">
                            <i class="ph ph-arrow-left text-xl"></i>
                        </div>
                        <span class="font-medium text-xl text-gray-800 tracking-tight">Back to <span
                                class="font-bold text-gsoc-blue">Home</span></span>
                    </a>
                </div>

                <!-- Right Side Actions -->
                <div class="flex items-center space-x-4">
                    <span class="hidden md:block text-sm text-gray-500">Need help? <a href="#"
                            class="text-gsoc-blue hover:underline">Contact Support</a></span>
                </div>
            </div>
        </div>
    </nav>

    <!-- Mobile Table of Contents (Sticky just below Nav) -->
    <div class="lg:hidden bg-white border-b border-gray-200 sticky top-16 z-40 transition-shadow"
        id="mobile-toc-container">
        <button id="mobile-toc-btn"
            class="w-full flex items-center justify-between px-4 py-3 text-sm font-medium text-gray-700 bg-gray-50 hover:bg-gray-100 focus:outline-none transition-colors">
            <span class="flex items-center text-gsoc-blue font-bold"><i class="ph ph-list mr-2 text-lg"></i> Jump to
                Section</span>
            <div class="flex items-center text-gray-400">
                <span id="current-section-label" class="mr-2 font-normal text-gray-500">Introduction</span>
                <i class="ph ph-caret-down transition-transform duration-200" id="mobile-toc-icon"></i>
            </div>
        </button>
        <!-- Dropdown Menu -->
        <div id="mobile-toc-menu"
            class="hidden bg-white border-t border-gray-100 shadow-xl max-h-[60vh] overflow-y-auto absolute w-full left-0 z-50">
            <nav class="p-2 space-y-1">
                <a href="#introduction"
                    class="mobile-toc-link block px-3 py-3 rounded-md text-sm font-medium text-gray-700 hover:bg-blue-50 hover:text-gsoc-blue border-l-4 border-transparent">Introduction</a>
                <a href="#eligibility"
                    class="mobile-toc-link block px-3 py-3 rounded-md text-sm font-medium text-gray-700 hover:bg-blue-50 hover:text-gsoc-blue border-l-4 border-transparent">Eligibility</a>
                <a href="#getting-started"
                    class="mobile-toc-link block px-3 py-3 rounded-md text-sm font-medium text-gray-700 hover:bg-blue-50 hover:text-gsoc-blue border-l-4 border-transparent">Getting
                    Started</a>
                <a href="#proposal-guide"
                    class="mobile-toc-link block px-3 py-3 rounded-md text-sm font-medium text-gray-700 hover:bg-blue-50 hover:text-gsoc-blue border-l-4 border-transparent">Writing
                    a Proposal</a>
                <a href="#evaluation"
                    class="mobile-toc-link block px-3 py-3 rounded-md text-sm font-medium text-gray-700 hover:bg-blue-50 hover:text-gsoc-blue border-l-4 border-transparent">Evaluations</a>
                <a href="#code-of-conduct"
                    class="mobile-toc-link block px-3 py-3 rounded-md text-sm font-medium text-gray-700 hover:bg-blue-50 hover:text-gsoc-blue border-l-4 border-transparent">Code
                    of Conduct</a>
            </nav>
        </div>
    </div>

    <!-- Header / Breadcrumb Area -->
    <div class="bg-white border-b border-gray-200 pt-24 pb-8 lg:pt-24 lg:pb-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center md:text-left">
                <div class="flex items-center justify-center md:justify-start gap-2 text-sm text-gray-500 mb-4">
                    <a href="../index.html" class="hover:text-gsoc-blue">Home</a>
                    <i class="ph ph-caret-right text-xs"></i>
                    <span class="text-gray-900 font-medium">Contributor Guide</span>
                </div>
                <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight sm:text-5xl mb-4">
                    Contributor Guide
                </h1>
                <p class="text-lg sm:text-xl text-gray-500 max-w-3xl mx-auto md:mx-0">
                    Everything you need to know about applying, coding, and succeeding in the program.
                </p>
            </div>
        </div>
    </div>

    <!-- Main Content Area -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 lg:py-12">
        <div class="lg:grid lg:grid-cols-12 lg:gap-8">

            <!-- Sidebar Navigation (Desktop Only) -->
            <aside class="hidden lg:block lg:col-span-3">
                <nav class="sidebar-sticky space-y-1" aria-label="Sidebar">
                    <a href="#introduction"
                        class="sidebar-link group flex items-center px-3 py-2 text-sm font-medium text-gsoc-blue border-l-4 border-gsoc-blue bg-blue-50">
                        <span class="truncate">Introduction</span>
                    </a>
                    <a href="#eligibility"
                        class="sidebar-link group flex items-center px-3 py-2 text-sm font-medium text-gray-600 border-l-4 border-transparent hover:bg-gray-50 hover:text-gray-900">
                        <span class="truncate">Eligibility</span>
                    </a>
                    <a href="#getting-started"
                        class="sidebar-link group flex items-center px-3 py-2 text-sm font-medium text-gray-600 border-l-4 border-transparent hover:bg-gray-50 hover:text-gray-900">
                        <span class="truncate">Getting Started</span>
                    </a>
                    <a href="#proposal-guide"
                        class="sidebar-link group flex items-center px-3 py-2 text-sm font-medium text-gray-600 border-l-4 border-transparent hover:bg-gray-50 hover:text-gray-900">
                        <span class="truncate">Writing a Proposal</span>
                    </a>
                    <a href="#evaluation"
                        class="sidebar-link group flex items-center px-3 py-2 text-sm font-medium text-gray-600 border-l-4 border-transparent hover:bg-gray-50 hover:text-gray-900">
                        <span class="truncate">Evaluations</span>
                    </a>
                    <a href="#code-of-conduct"
                        class="sidebar-link group flex items-center px-3 py-2 text-sm font-medium text-gray-600 border-l-4 border-transparent hover:bg-gray-50 hover:text-gray-900">
                        <span class="truncate">Code of Conduct</span>
                    </a>
                </nav>
            </aside>

            <!-- Content Column -->
            <main
                class="lg:col-span-9 prose max-w-none bg-white p-6 sm:p-8 rounded-xl shadow-sm border border-gray-100">

                <!-- Introduction -->
                <section id="introduction" class="scroll-mt-32 lg:scroll-mt-24">
                    <div class="flex flex-col sm:flex-row sm:items-center gap-3 mb-6">
                        <div
                            class="w-12 h-12 flex items-center justify-center bg-blue-100 rounded-lg text-gsoc-blue flex-shrink-0">
                            <i class="ph ph-hand-waving text-2xl"></i>
                        </div>
                        <h2 class="!mt-0 !mb-0 !border-0 text-2xl sm:text-3xl">Welcome Future Contributors</h2>
                    </div>
                    <p>
                        Welcome to the official Contributor Guide! This document is your roadmap to participating in the
                        program. Whether you are a seasoned open-source developer or making your first commit, this
                        guide will help you navigate the process from application to final submission.
                    </p>
                    <div class="bg-blue-50 border-l-4 border-gsoc-blue p-4 my-6 rounded-r-md">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <i class="ph ph-info text-gsoc-blue text-xl"></i>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm text-blue-700 font-medium !mb-0">
                                    <strong>Note:</strong> Applications open on [Date Placeholder]. Please ensure you
                                    have read this entire guide before asking questions in the community channels.
                                </p>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Eligibility -->
                <section id="eligibility" class="scroll-mt-32 lg:scroll-mt-24">
                    <h2>Eligibility Requirements</h2>
                    <p>To participate in this year's program, you must meet the following criteria:</p>
                    <ul class="space-y-2">
                        <li><i class="ph ph-check-circle text-gsoc-green mr-2"></i> Be at least 18 years of age upon
                            registration.</li>
                        <li><i class="ph ph-check-circle text-gsoc-green mr-2"></i> Be a student enrolled in or accepted
                            into an accredited institution.</li>
                        <li><i class="ph ph-check-circle text-gsoc-green mr-2"></i> Be eligible to work in your country
                            of residence during the program duration.</li>
                        <li><i class="ph ph-check-circle text-gsoc-green mr-2"></i> Not be a resident of a US embargoed
                            country.</li>
                    </ul>
                </section>

                <!-- Getting Started -->
                <section id="getting-started" class="scroll-mt-32 lg:scroll-mt-24">
                    <h2>Getting Started</h2>
                    <p>
                        Finding the right project is the most critical step. Don't wait until the application period
                        opens!
                    </p>
                    <h3>1. Choose an Organization</h3>
                    <p>Browse the list of <a href="#">participating organizations</a>. Look for technologies you are
                        familiar with or want to learn (e.g., Python, React, Machine Learning).</p>

                    <h3>2. Introduce Yourself</h3>
                    <p>Join the organization's communication channel (Slack, Discord, Mailing List). Be polite,
                        introduce yourself, and mention you are interested in GSoC.</p>

                    <h3>3. Make a Contribution</h3>
                    <p>Fix a bug, update documentation, or solve a "good first issue." This shows mentors that you are
                        serious and capable.</p>
                </section>

                <!-- Proposal Guide -->
                <section id="proposal-guide" class="scroll-mt-32 lg:scroll-mt-24">
                    <h2>Writing a Winning Proposal</h2>
                    <p>Your proposal is the most important part of your application. It should be detailed, realistic,
                        and well-structured.</p>

                    <div class="grid md:grid-cols-2 gap-6 my-6 not-prose">
                        <div class="bg-gray-50 p-5 rounded-lg border border-gray-200">
                            <h4 class="font-bold text-gray-900 mb-2">Do's</h4>
                            <ul class="space-y-2 text-sm text-gray-600">
                                <li class="flex items-start"><i class="ph ph-check text-gsoc-green mr-2 mt-0.5"></i>
                                    Discuss your idea with mentors first.</li>
                                <li class="flex items-start"><i class="ph ph-check text-gsoc-green mr-2 mt-0.5"></i>
                                    Include a detailed weekly timeline.</li>
                                <li class="flex items-start"><i class="ph ph-check text-gsoc-green mr-2 mt-0.5"></i>
                                    Mention your previous contributions.</li>
                            </ul>
                        </div>
                        <div class="bg-gray-50 p-5 rounded-lg border border-gray-200">
                            <h4 class="font-bold text-gray-900 mb-2">Don'ts</h4>
                            <ul class="space-y-2 text-sm text-gray-600">
                                <li class="flex items-start"><i class="ph ph-x text-gsoc-red mr-2 mt-0.5"></i> Leave it
                                    until the last minute.</li>
                                <li class="flex items-start"><i class="ph ph-x text-gsoc-red mr-2 mt-0.5"></i>
                                    Copy-paste generic proposals.</li>
                                <li class="flex items-start"><i class="ph ph-x text-gsoc-red mr-2 mt-0.5"></i> Ghost
                                    your mentors after submitting.</li>
                            </ul>
                        </div>
                    </div>

                    <h3>Standard Proposal Structure</h3>
                    <ul>
                        <li><strong>Project Title:</strong> Clear and concise.</li>
                        <li><strong>Abstract:</strong> A short summary of what you will achieve.</li>
                        <li><strong>Technical Details:</strong> Implementation plan, architecture, and tools.</li>
                        <li><strong>Timeline:</strong> Week-by-week breakdown of deliverables.</li>
                        <li><strong>About Me:</strong> Your background and why you are the right person.</li>
                    </ul>
                    <a href="#" class="inline-flex items-center text-gsoc-blue font-medium hover:underline mt-2">
                        <i class="ph ph-download-simple mr-2"></i> Download Proposal Template (PDF)
                    </a>
                </section>

                <!-- Evaluations -->
                <section id="evaluation" class="scroll-mt-32 lg:scroll-mt-24">
                    <h2>Evaluations</h2>
                    <p>There are two major evaluations during the program. Passing these is required to receive the
                        stipend.</p>
                    <div class="relative pl-8 border-l-2 border-gray-200 space-y-8 my-8">
                        <div class="relative">
                            <span
                                class="absolute -left-[41px] top-0 bg-gsoc-yellow text-white w-8 h-8 rounded-full flex items-center justify-center font-bold text-sm">1</span>
                            <h4 class="text-lg font-bold text-gray-900">Midterm Evaluation</h4>
                            <p class="text-sm text-gray-500 mt-1">Occurs after the first 6 weeks. Mentors assess your
                                progress against your timeline.</p>
                        </div>
                        <div class="relative">
                            <span
                                class="absolute -left-[41px] top-0 bg-gsoc-green text-white w-8 h-8 rounded-full flex items-center justify-center font-bold text-sm">2</span>
                            <h4 class="text-lg font-bold text-gray-900">Final Evaluation</h4>
                            <p class="text-sm text-gray-500 mt-1">Occurs at the end of the program. You must submit your
                                code and a final report.</p>
                        </div>
                    </div>
                </section>

                <!-- Code of Conduct -->
                <section id="code-of-conduct" class="scroll-mt-32 lg:scroll-mt-24">
                    <h2>Code of Conduct</h2>
                    <p>We are dedicated to providing a harassment-free experience for everyone. We do not tolerate
                        harassment of participants in any form.</p>
                    <p>
                        Please read our full <a href="#">Code of Conduct</a>. By participating, you agree to abide by
                        these rules.
                    </p>
                </section>

            </main>
        </div>
    </div>

    <!-- Footer (Simplified) -->
    <footer class="bg-white border-t border-gray-200 mt-auto py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <p class="text-sm text-gray-500">&copy; Slugworks 2025-2026</p>
        </div>
    </footer>

    <!-- Interactive Script -->
    <script>
        // --- Mobile Menu Toggle Logic ---
        const mobileTocBtn = document.getElementById('mobile-toc-btn');
        const mobileTocMenu = document.getElementById('mobile-toc-menu');
        const mobileTocIcon = document.getElementById('mobile-toc-icon');
        const currentSectionLabel = document.getElementById('current-section-label');
        const mobileLinks = document.querySelectorAll('.mobile-toc-link');

        function toggleMobileMenu() {
            mobileTocMenu.classList.toggle('hidden');
            // Rotate icon
            if (mobileTocMenu.classList.contains('hidden')) {
                mobileTocIcon.style.transform = 'rotate(0deg)';
            } else {
                mobileTocIcon.style.transform = 'rotate(180deg)';
            }
        }

        mobileTocBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            toggleMobileMenu();
        });

        // Close menu when clicking outside
        document.addEventListener('click', (e) => {
            if (!mobileTocMenu.contains(e.target) && !mobileTocBtn.contains(e.target)) {
                if (!mobileTocMenu.classList.contains('hidden')) {
                    toggleMobileMenu();
                }
            }
        });

        // --- Active Section Highlighting (Desktop & Mobile) ---
        const sections = document.querySelectorAll('section');
        const desktopLinks = document.querySelectorAll('.sidebar-link');

        function updateActiveLink() {
            let current = '';

            // Determine which section is currently active
            sections.forEach(section => {
                const sectionTop = section.offsetTop;
                // Offset calculation to account for sticky headers
                if (window.scrollY >= (sectionTop - 250)) {
                    current = section.getAttribute('id');
                }
            });

            // If we are at the very top, default to first section
            if (window.scrollY < 200) current = 'introduction';

            // Update Desktop Sidebar
            desktopLinks.forEach(link => {
                link.classList.remove('text-gsoc-blue', 'border-l-4', 'border-gsoc-blue', 'bg-blue-50');
                link.classList.add('text-gray-600', 'border-transparent');
                if (link.getAttribute('href').includes(current)) {
                    link.classList.add('text-gsoc-blue', 'border-l-4', 'border-gsoc-blue', 'bg-blue-50');
                    link.classList.remove('text-gray-600', 'border-transparent');
                }
            });

            // Update Mobile Menu Styles & Label
            mobileLinks.forEach(link => {
                // Reset styles
                link.classList.remove('bg-blue-50', 'text-gsoc-blue', 'border-gsoc-blue');
                link.classList.add('text-gray-700', 'border-transparent');

                if (link.getAttribute('href').includes(current)) {
                    link.classList.add('bg-blue-50', 'text-gsoc-blue', 'border-gsoc-blue');
                    link.classList.remove('text-gray-700', 'border-transparent');

                    // Update the label in the closed mobile bar
                    currentSectionLabel.textContent = link.textContent;
                }
            });
        }

        window.addEventListener('scroll', updateActiveLink);

        // Mobile Link Click Handler (Closes menu)
        mobileLinks.forEach(link => {
            link.addEventListener('click', () => {
                if (!mobileTocMenu.classList.contains('hidden')) {
                    toggleMobileMenu();
                }
            });
        });

        // Run once on load
        updateActiveLink();
    </script>
</body>

</html>