<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Privacy & Terms - Slugworks Summer of Code</title>

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

        /* Legal Page specific styling (Neutral Theme) */
        .sidebar-link:hover {
            color: #1f2937;
            /* Dark Gray */
            border-left-color: #1f2937;
            background-color: #f3f4f6;
            /* Gray-100 */
        }

        .prose h2 {
            font-size: 1.5rem;
            font-weight: 700;
            color: #1f2937;
            margin-top: 2.5rem;
            margin-bottom: 1rem;
            padding-bottom: 0.5rem;
            border-bottom: 1px solid #e5e7eb;
        }

        .prose h3 {
            font-size: 1.15rem;
            font-weight: 600;
            color: #374151;
            margin-top: 1.5rem;
            margin-bottom: 0.75rem;
        }

        .prose p {
            color: #4b5563;
            line-height: 1.75;
            margin-bottom: 1.25rem;
            font-size: 0.95rem;
        }

        .prose ul {
            list-style-type: disc;
            padding-left: 1.5rem;
            margin-bottom: 1.5rem;
            color: #4b5563;
        }

        .section-divider {
            border-top: 4px solid #f3f4f6;
            margin: 4rem 0;
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
                            class="w-10 h-10 bg-gray-600 rounded-full flex items-center justify-center text-white group-hover:bg-gray-800 transition">
                            <i class="ph ph-arrow-left text-xl"></i>
                        </div>
                        <span class="font-medium text-xl text-gray-800 tracking-tight">Back to <span
                                class="font-bold text-gray-600">Home</span></span>
                    </a>
                </div>

                <!-- Right Side Actions -->
                <div class="flex items-center space-x-4">
                    <span class="hidden md:block text-sm text-gray-500">Last Updated: January 15, 2025</span>
                </div>
            </div>
        </div>
    </nav>

    <!-- Mobile Table of Contents -->
    <div class="lg:hidden bg-white border-b border-gray-200 sticky top-16 z-40 transition-shadow"
        id="mobile-toc-container">
        <button id="mobile-toc-btn"
            class="w-full flex items-center justify-between px-4 py-3 text-sm font-medium text-gray-700 bg-gray-50 hover:bg-gray-100 focus:outline-none transition-colors">
            <span class="flex items-center text-gray-800 font-bold"><i class="ph ph-list mr-2 text-lg"></i> Jump to
                Section</span>
            <div class="flex items-center text-gray-400">
                <span id="current-section-label" class="mr-2 font-normal text-gray-500">Privacy Policy</span>
                <i class="ph ph-caret-down transition-transform duration-200" id="mobile-toc-icon"></i>
            </div>
        </button>
        <div id="mobile-toc-menu"
            class="hidden bg-white border-t border-gray-100 shadow-xl max-h-[60vh] overflow-y-auto absolute w-full left-0 z-50">
            <nav class="p-2 space-y-1">
                <div class="px-3 py-2 text-xs font-semibold text-gray-400 uppercase tracking-wider">Privacy Policy</div>
                <a href="#privacy-intro"
                    class="mobile-toc-link block px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-100 border-l-4 border-transparent">Introduction</a>
                <a href="#data-collection"
                    class="mobile-toc-link block px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-100 border-l-4 border-transparent">Data
                    We Collect</a>
                <a href="#data-usage"
                    class="mobile-toc-link block px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-100 border-l-4 border-transparent">How
                    We Use Data</a>

                <div class="px-3 py-2 mt-2 text-xs font-semibold text-gray-400 uppercase tracking-wider">Terms of
                    Service</div>
                <a href="#terms-intro"
                    class="mobile-toc-link block px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-100 border-l-4 border-transparent">Acceptance</a>
                <a href="#user-conduct"
                    class="mobile-toc-link block px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-100 border-l-4 border-transparent">User
                    Conduct</a>
                <a href="#ip-rights"
                    class="mobile-toc-link block px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-100 border-l-4 border-transparent">Intellectual
                    Property</a>
            </nav>
        </div>
    </div>

    <!-- Header -->
    <div class="bg-white border-b border-gray-200 pt-24 pb-8 lg:pt-24 lg:pb-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center md:text-left">
                <div class="flex items-center justify-center md:justify-start gap-2 text-sm text-gray-500 mb-4">
                    <a href="../index.html" class="hover:text-gray-900">Home</a>
                    <i class="ph ph-caret-right text-xs"></i>
                    <span class="text-gray-900 font-medium">Privacy & Terms</span>
                </div>
                <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight sm:text-5xl mb-4">
                    Legal Information
                </h1>
                <p class="text-lg sm:text-xl text-gray-500 max-w-3xl mx-auto md:mx-0">
                    Our commitment to your privacy and the rules for participating in our program.
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
                    <div class="px-3 mb-2 text-xs font-semibold text-gray-400 uppercase tracking-wider">Privacy Policy
                    </div>
                    <a href="#privacy-intro"
                        class="sidebar-link group flex items-center px-3 py-2 text-sm font-medium text-gray-900 border-l-4 border-gray-900 bg-gray-100">
                        <span class="truncate">Introduction</span>
                    </a>
                    <a href="#data-collection"
                        class="sidebar-link group flex items-center px-3 py-2 text-sm font-medium text-gray-600 border-l-4 border-transparent hover:bg-gray-50 hover:text-gray-900">
                        <span class="truncate">Data We Collect</span>
                    </a>
                    <a href="#data-usage"
                        class="sidebar-link group flex items-center px-3 py-2 text-sm font-medium text-gray-600 border-l-4 border-transparent hover:bg-gray-50 hover:text-gray-900">
                        <span class="truncate">How We Use Data</span>
                    </a>

                    <div class="px-3 mt-6 mb-2 text-xs font-semibold text-gray-400 uppercase tracking-wider">Terms of
                        Service</div>
                    <a href="#terms-intro"
                        class="sidebar-link group flex items-center px-3 py-2 text-sm font-medium text-gray-600 border-l-4 border-transparent hover:bg-gray-50 hover:text-gray-900">
                        <span class="truncate">Acceptance</span>
                    </a>
                    <a href="#user-conduct"
                        class="sidebar-link group flex items-center px-3 py-2 text-sm font-medium text-gray-600 border-l-4 border-transparent hover:bg-gray-50 hover:text-gray-900">
                        <span class="truncate">User Conduct</span>
                    </a>
                    <a href="#ip-rights"
                        class="sidebar-link group flex items-center px-3 py-2 text-sm font-medium text-gray-600 border-l-4 border-transparent hover:bg-gray-50 hover:text-gray-900">
                        <span class="truncate">Intellectual Property</span>
                    </a>
                </nav>
            </aside>

            <!-- Content -->
            <main class="lg:col-span-9 prose max-w-none bg-white p-8 rounded-xl shadow-sm border border-gray-100">

                <!-- PRIVACY POLICY -->
                <div class="mb-8">
                    <span
                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 mb-4">
                        Privacy Policy
                    </span>
                    <h1 class="text-3xl font-bold text-gray-900 mb-6 border-none pt-0 mt-0">Slugworks Privacy Policy
                    </h1>
                </div>

                <section id="privacy-intro" class="scroll-mt-32 lg:scroll-mt-24">
                    <p>
                        At Slugworks, we respect your privacy and are committed to protecting the personal information
                        you share with us. This Privacy Policy outlines our practices regarding the collection, use, and
                        disclosure of your information through the Summer of Code program.
                    </p>
                </section>

                <section id="data-collection" class="scroll-mt-32 lg:scroll-mt-24">
                    <h2>Data We Collect</h2>
                    <p>We collect information that you voluntarily provide to us when you register for an account,
                        submit a proposal, or communicate with us.</p>
                    <ul>
                        <li><strong>Personal Identity:</strong> Name, email address, physical address, and phone number.
                        </li>
                        <li><strong>Academic Information:</strong> Proof of enrollment, university name, and graduation
                            date.</li>
                        <li><strong>Technical Profile:</strong> GitHub/GitLab username, coding samples, and project
                            proposals.</li>
                        <li><strong>Payment Data:</strong> Tax identification numbers and banking details (processed
                            securely via Payoneer).</li>
                    </ul>
                </section>

                <section id="data-usage" class="scroll-mt-32 lg:scroll-mt-24">
                    <h2>How We Use Data</h2>
                    <p>Your data is used solely for the administration of the Summer of Code program. Specifically, we
                        use it to:</p>
                    <ul>
                        <li>Verify your eligibility to participate in the program.</li>
                        <li>Facilitate communication between students, mentors, and organization administrators.</li>
                        <li>Process stipend payments and tax forms.</li>
                        <li>Analyze program demographics to improve future iterations (data is anonymized where
                            possible).</li>
                    </ul>
                </section>

                <!-- DIVIDER -->
                <div class="section-divider"></div>

                <!-- TERMS OF SERVICE -->
                <div class="mb-8">
                    <span
                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800 mb-4">
                        Terms of Service
                    </span>
                    <h1 class="text-3xl font-bold text-gray-900 mb-6 border-none pt-0 mt-0">Slugworks Terms of Service
                    </h1>
                </div>

                <section id="terms-intro" class="scroll-mt-32 lg:scroll-mt-24">
                    <h2>Acceptance of Terms</h2>
                    <p>
                        By accessing or using the Slugworks Summer of Code platform, you agree to be bound by these
                        Terms of Service and all applicable laws and regulations. If you do not agree with any of these
                        terms, you are prohibited from using or accessing this site.
                    </p>
                </section>

                <section id="user-conduct" class="scroll-mt-32 lg:scroll-mt-24">
                    <h2>User Conduct</h2>
                    <p>Participants in the program are expected to maintain a professional and respectful demeanor. You
                        agree not to:</p>
                    <ul>
                        <li>Harass, threaten, or discriminate against other participants.</li>
                        <li>Submit code that contains malicious software, viruses, or harmful scripts.</li>
                        <li>Attempt to gain unauthorized access to the platform or other user accounts.</li>
                        <li>Falsify identity documents or academic records.</li>
                    </ul>
                </section>

                <section id="ip-rights" class="scroll-mt-32 lg:scroll-mt-24">
                    <h2>Intellectual Property</h2>
                    <p>
                        <strong>Code Ownership:</strong> Code written by students during the program is generally owned
                        by the student or the mentor organization, depending on the specific open source license used by
                        the project (e.g., MIT, Apache 2.0, GPL). Slugworks claims no ownership over the code produced.
                    </p>
                    <p>
                        <strong>Trademarks:</strong> "Slugworks" and the Slugworks logo are trademarks of Slugworks Inc.
                        You may use them only to identify your participation in the program.
                    </p>
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

            if (window.scrollY < 200) current = 'privacy-intro';

            desktopLinks.forEach(link => {
                link.classList.remove('text-gray-900', 'border-l-4', 'border-gray-900', 'bg-gray-100');
                link.classList.add('text-gray-600', 'border-transparent');

                if (link.getAttribute('href').includes(current)) {
                    link.classList.add('text-gray-900', 'border-l-4', 'border-gray-900', 'bg-gray-100');
                    link.classList.remove('text-gray-600', 'border-transparent');
                }
            });

            mobileLinks.forEach(link => {
                link.classList.remove('bg-gray-100', 'text-gray-900', 'border-gray-900');
                link.classList.add('text-gray-700', 'border-transparent');

                if (link.getAttribute('href').includes(current)) {
                    link.classList.add('bg-gray-100', 'text-gray-900', 'border-gray-900');
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