<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Timeline - Slugworks Summer of Code</title>

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
        }

        @media (min-width: 1024px) {
            html {
                scroll-padding-top: 100px;
            }
        }

        .sidebar-sticky {
            position: -webkit-sticky;
            position: sticky;
            top: 6rem;
            max-height: calc(100vh - 6rem);
            overflow-y: auto;
        }

        /* Timeline Page specific styling (Blue Theme) */
        .sidebar-link:hover {
            color: #4285F4;
            border-left-color: #4285F4;
            background-color: #eff6ff;
            /* Blue-50 */
        }

        .prose h2 {
            font-size: 1.5rem;
            font-weight: 700;
            color: #1f2937;
            margin-top: 2rem;
            margin-bottom: 1.5rem;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid #e5e7eb;
            display: flex;
            align-items: center;
        }

        .prose h3 {
            font-size: 1.25rem;
            font-weight: 600;
            color: #111827;
            margin-bottom: 0.75rem;
            margin-top: 1.5rem;
        }

        .prose p {
            color: #4b5563;
            line-height: 1.75;
            margin-bottom: 1.25rem;
        }

        /* Timeline Event Item */
        .timeline-item {
            position: relative;
            padding-left: 2rem;
            margin-bottom: 2rem;
            border-left: 2px solid #e5e7eb;
        }

        .timeline-item::before {
            content: '';
            position: absolute;
            left: -9px;
            /* Center on the 2px border */
            top: 6px;
            width: 16px;
            height: 16px;
            border-radius: 50%;
            background-color: #fff;
            border: 4px solid #4285F4;
            /* Default blue */
        }

        .timeline-item.red::before {
            border-color: #EA4335;
        }

        .timeline-item.yellow::before {
            border-color: #FBBC04;
        }

        .timeline-item.green::before {
            border-color: #34A853;
        }

        .date-badge {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            background-color: #f3f4f6;
            color: #374151;
            font-weight: 600;
            font-size: 0.875rem;
            border-radius: 9999px;
            margin-bottom: 0.5rem;
        }
    </style>
</head>

<body class="font-sans text-gray-700 bg-gsoc-bg overflow-x-hidden flex flex-col min-h-screen">

    <!-- Navigation -->
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
                    <span class="hidden md:block text-sm text-gray-500">Add dates to <a href="#"
                            class="text-gsoc-blue hover:underline">Google Calendar</a></span>
                </div>
            </div>
        </div>
    </nav>

    <!-- Mobile Table of Contents -->
    <div class="lg:hidden bg-white border-b border-gray-200 sticky top-16 z-40 transition-shadow"
        id="mobile-toc-container">
        <button id="mobile-toc-btn"
            class="w-full flex items-center justify-between px-4 py-3 text-sm font-medium text-gray-700 bg-gray-50 hover:bg-gray-100 focus:outline-none transition-colors">
            <span class="flex items-center text-gsoc-blue font-bold"><i class="ph ph-list mr-2 text-lg"></i> Jump to
                Phase</span>
            <div class="flex items-center text-gray-400">
                <span id="current-section-label" class="mr-2 font-normal text-gray-500">Program Announcement</span>
                <i class="ph ph-caret-down transition-transform duration-200" id="mobile-toc-icon"></i>
            </div>
        </button>
        <div id="mobile-toc-menu"
            class="hidden bg-white border-t border-gray-100 shadow-xl max-h-[60vh] overflow-y-auto absolute w-full left-0 z-50">
            <nav class="p-2 space-y-1">
                <a href="#announcement"
                    class="mobile-toc-link block px-3 py-3 rounded-md text-sm font-medium text-gray-700 hover:bg-blue-50 hover:text-gsoc-blue border-l-4 border-transparent">Program
                    Announcement</a>
                <a href="#application"
                    class="mobile-toc-link block px-3 py-3 rounded-md text-sm font-medium text-gray-700 hover:bg-blue-50 hover:text-gsoc-blue border-l-4 border-transparent">Application
                    Period</a>
                <a href="#bonding"
                    class="mobile-toc-link block px-3 py-3 rounded-md text-sm font-medium text-gray-700 hover:bg-blue-50 hover:text-gsoc-blue border-l-4 border-transparent">Community
                    Bonding</a>
                <a href="#coding"
                    class="mobile-toc-link block px-3 py-3 rounded-md text-sm font-medium text-gray-700 hover:bg-blue-50 hover:text-gsoc-blue border-l-4 border-transparent">Coding
                    Period</a>
                <a href="#results"
                    class="mobile-toc-link block px-3 py-3 rounded-md text-sm font-medium text-gray-700 hover:bg-blue-50 hover:text-gsoc-blue border-l-4 border-transparent">Results</a>
            </nav>
        </div>
    </div>

    <!-- Header -->
    <div class="bg-white border-b border-gray-200 pt-24 pb-8 lg:pt-24 lg:pb-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center md:text-left">
                <div class="flex items-center justify-center md:justify-start gap-2 text-sm text-gray-500 mb-4">
                    <a href="../index.html" class="hover:text-gsoc-blue">Home</a>
                    <i class="ph ph-caret-right text-xs"></i>
                    <span class="text-gray-900 font-medium">Timeline</span>
                </div>
                <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight sm:text-5xl mb-4">
                    Program Timeline
                </h1>
                <p class="text-lg sm:text-xl text-gray-500 max-w-3xl mx-auto md:mx-0">
                    Key dates and deadlines for students and organizations in 2025.
                </p>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 lg:py-12">
        <div class="lg:grid lg:grid-cols-12 lg:gap-8">

            <!-- Sidebar (Desktop) -->
            <aside class="hidden lg:block lg:col-span-3">
                <nav class="sidebar-sticky space-y-1" aria-label="Sidebar">
                    <a href="#announcement"
                        class="sidebar-link group flex items-center px-3 py-2 text-sm font-medium text-gsoc-blue border-l-4 border-gsoc-blue bg-blue-50">
                        <span class="truncate">Program Announcement</span>
                    </a>
                    <a href="#application"
                        class="sidebar-link group flex items-center px-3 py-2 text-sm font-medium text-gray-600 border-l-4 border-transparent hover:bg-blue-50 hover:text-gray-900">
                        <span class="truncate">Application Period</span>
                    </a>
                    <a href="#bonding"
                        class="sidebar-link group flex items-center px-3 py-2 text-sm font-medium text-gray-600 border-l-4 border-transparent hover:bg-blue-50 hover:text-gray-900">
                        <span class="truncate">Community Bonding</span>
                    </a>
                    <a href="#coding"
                        class="sidebar-link group flex items-center px-3 py-2 text-sm font-medium text-gray-600 border-l-4 border-transparent hover:bg-blue-50 hover:text-gray-900">
                        <span class="truncate">Coding Period</span>
                    </a>
                    <a href="#results"
                        class="sidebar-link group flex items-center px-3 py-2 text-sm font-medium text-gray-600 border-l-4 border-transparent hover:bg-blue-50 hover:text-gray-900">
                        <span class="truncate">Results</span>
                    </a>
                </nav>
            </aside>

            <!-- Content -->
            <main
                class="lg:col-span-9 prose max-w-none bg-white p-6 sm:p-8 rounded-xl shadow-sm border border-gray-100">

                <!-- Announcement Section -->
                <section id="announcement" class="scroll-mt-32 lg:scroll-mt-24">
                    <h2><i class="ph ph-megaphone mr-3 text-gsoc-blue"></i> Program Announcement</h2>

                    <div class="timeline-item">
                        <span class="date-badge">January 20, 2025</span>
                        <h3 class="!mt-1">Organizations Apply</h3>
                        <p>Open source organizations submit their applications to be mentor organizations for the
                            upcoming year.</p>
                    </div>

                    <div class="timeline-item">
                        <span class="date-badge">February 20, 2025</span>
                        <h3 class="!mt-1">List of Accepted Organizations Announced</h3>
                        <p>Slugworks publishes the list of accepted mentoring organizations. Students should begin
                            researching projects and discussing ideas with mentors.</p>
                    </div>
                </section>

                <!-- Application Section -->
                <section id="application" class="scroll-mt-32 lg:scroll-mt-24">
                    <h2><i class="ph ph-pencil-simple mr-3 text-gsoc-red"></i> Application Period</h2>

                    <div class="timeline-item red">
                        <span class="date-badge">March 18, 2025</span>
                        <h3 class="!mt-1">Student Application Period Opens</h3>
                        <p>Students can register on the program site and begin submitting proposals to mentor
                            organizations.</p>
                    </div>

                    <div class="timeline-item red">
                        <span class="date-badge">April 2, 2025</span>
                        <h3 class="!mt-1">Student Application Deadline</h3>
                        <p>All proposals must be submitted by 18:00 UTC. No extensions will be given.</p>
                    </div>
                </section>

                <!-- Community Bonding Section -->
                <section id="bonding" class="scroll-mt-32 lg:scroll-mt-24">
                    <h2><i class="ph ph-users-three mr-3 text-gsoc-yellow"></i> Community Bonding</h2>

                    <div class="timeline-item yellow">
                        <span class="date-badge">May 1, 2025</span>
                        <h3 class="!mt-1">Accepted Students Announced</h3>
                        <p>Accepted students are paired with mentors and begin the Community Bonding period. This is the
                            time to get to know your community, refine your project plan, and set up your development
                            environment.</p>
                    </div>
                </section>

                <!-- Coding Section -->
                <section id="coding" class="scroll-mt-32 lg:scroll-mt-24">
                    <h2><i class="ph ph-code mr-3 text-gsoc-green"></i> Coding Period</h2>

                    <div class="timeline-item green">
                        <span class="date-badge">May 27, 2025</span>
                        <h3 class="!mt-1">Coding Officially Begins</h3>
                        <p>Students begin working on their projects full-time (or part-time if applicable).</p>
                    </div>

                    <div class="timeline-item green">
                        <span class="date-badge">July 8, 2025</span>
                        <h3 class="!mt-1">Midterm Evaluations</h3>
                        <p>Mentors evaluate student progress. Students must pass this evaluation to continue in the
                            program and receive the first stipend installment.</p>
                    </div>

                    <div class="timeline-item green">
                        <span class="date-badge">August 26, 2025</span>
                        <h3 class="!mt-1">Final Submission Deadline</h3>
                        <p>Students submit their final code, project URL, and a final work product submission.</p>
                    </div>
                </section>

                <!-- Results Section -->
                <section id="results" class="scroll-mt-32 lg:scroll-mt-24">
                    <h2><i class="ph ph-medal mr-3 text-gsoc-blue"></i> Results</h2>

                    <div class="timeline-item">
                        <span class="date-badge">September 3, 2025</span>
                        <h3 class="!mt-1">Mentor Final Evaluations</h3>
                        <p>Mentors review the final student submissions.</p>
                    </div>

                    <div class="timeline-item">
                        <span class="date-badge">September 10, 2025</span>
                        <h3 class="!mt-1">Results Announced</h3>
                        <p>Successful student projects are announced, and students who pass receive their final stipend
                            and certificate of completion.</p>
                    </div>
                </section>

            </main>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-200 mt-auto py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="flex items-center justify-center gap-2 mb-4 text-gray-600">
                <i class="ph ph-code text-xl"></i>
                <span class="font-bold">Slugworks Open Source</span>
            </div>
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

        document.addEventListener('click', (e) => {
            if (!mobileTocMenu.contains(e.target) && !mobileTocBtn.contains(e.target)) {
                if (!mobileTocMenu.classList.contains('hidden')) {
                    toggleMobileMenu();
                }
            }
        });

        // --- Active Section Highlighting ---
        const sections = document.querySelectorAll('section');
        const desktopLinks = document.querySelectorAll('.sidebar-link');

        function updateActiveLink() {
            let current = '';

            sections.forEach(section => {
                const sectionTop = section.offsetTop;
                if (window.scrollY >= (sectionTop - 250)) {
                    current = section.getAttribute('id');
                }
            });

            if (window.scrollY < 200) current = 'announcement';

            desktopLinks.forEach(link => {
                link.classList.remove('text-gsoc-blue', 'border-l-4', 'border-gsoc-blue', 'bg-blue-50');
                link.classList.add('text-gray-600', 'border-transparent');

                if (link.getAttribute('href').includes(current)) {
                    link.classList.add('text-gsoc-blue', 'border-l-4', 'border-gsoc-blue', 'bg-blue-50');
                    link.classList.remove('text-gray-600', 'border-transparent');
                }
            });

            mobileLinks.forEach(link => {
                link.classList.remove('bg-blue-50', 'text-gsoc-blue', 'border-gsoc-blue');
                link.classList.add('text-gray-700', 'border-transparent');

                if (link.getAttribute('href').includes(current)) {
                    link.classList.add('bg-blue-50', 'text-gsoc-blue', 'border-gsoc-blue');
                    link.classList.remove('text-gray-700', 'border-transparent');
                    currentSectionLabel.textContent = link.textContent;
                }
            });
        }

        window.addEventListener('scroll', updateActiveLink);

        mobileLinks.forEach(link => {
            link.addEventListener('click', () => {
                if (!mobileTocMenu.classList.contains('hidden')) {
                    toggleMobileMenu();
                }
            });
        });

        updateActiveLink();
    </script>
</body>

</html>