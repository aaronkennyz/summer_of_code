<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projects - Slugworks Summer of Code</title>

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
                    },
                    keyframes: {
                        'fade-in-up': {
                            '0%': { opacity: '0', transform: 'translateY(10px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' },
                        },
                        'slide-in-right': {
                            '0%': { transform: 'translateX(100%)', opacity: '0' },
                            '100%': { transform: 'translateX(0)', opacity: '1' },
                        }
                    },
                    animation: {
                        'fade-in-up': 'fade-in-up 0.3s ease-out',
                        'slide-in-right': 'slide-in-right 0.3s ease-out'
                    }
                }
            }
        }
    </script>

    <style>
        .project-card {
            transition: all 0.3s ease;
        }
        .project-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            border-color: #34A853;
        }
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }
        .scrollbar-hide {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
</head>

<body class="font-sans text-gray-700 bg-gsoc-bg flex flex-col min-h-screen">

    <!-- Navigation -->
    <nav class="bg-white shadow-sm fixed w-full z-50 h-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <!-- Logo/Back Area -->
                <div class="flex items-center">
                    <a href="../index.php" class="flex-shrink-0 flex items-center gap-2 cursor-pointer group">
                        <div class="w-10 h-10 bg-gsoc-green rounded-full flex items-center justify-center text-white group-hover:bg-green-600 transition">
                            <i class="ph ph-arrow-left text-xl"></i>
                        </div>
                        <span class="font-medium text-xl text-gray-800 tracking-tight">Back to <span class="font-bold text-gsoc-green">Home</span></span>
                    </a>
                </div>

                <!-- Right Side Actions -->
                <div class="flex items-center space-x-4">
                    <div class="flex items-center bg-gray-100 rounded-lg p-1">
                        <button id="btn-role-student" onclick="setRole('student')" class="px-3 py-1.5 text-sm font-medium rounded-md transition-all bg-white text-gsoc-green shadow-sm">
                            Student
                        </button>
                        <button id="btn-role-host" onclick="setRole('host')" class="px-3 py-1.5 text-sm font-medium rounded-md transition-all text-gray-500 hover:text-gray-700">
                            Host
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Header & Search -->
    <div class="bg-white border-b border-gray-200 pt-24 pb-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
                <div>
                    <div class="flex items-center gap-3 mb-2">
                        <h1 id="page-title" class="text-3xl font-extrabold text-gray-900 tracking-tight sm:text-4xl">
                            Approved Projects
                        </h1>
                        <span id="host-badge" class="hidden bg-blue-100 text-blue-800 text-xs font-bold px-2.5 py-0.5 rounded border border-blue-200">HOST MODE</span>
                        <span id="demo-badge" class="hidden bg-gray-100 text-gray-600 text-xs font-bold px-2.5 py-0.5 rounded border border-gray-200">LOCAL DEMO</span>
                    </div>
                    <p id="page-desc" class="text-lg text-gray-500">
                        Discover the incredible work done by students this summer.
                    </p>
                </div>

                <!-- Search & Create Actions -->
                <div class="flex flex-col gap-3 w-full md:w-auto items-end">
                    <button id="btn-create-project-hero" onclick="openCreateModal()" class="hidden w-full md:w-auto bg-gsoc-green hover:bg-green-600 text-white font-bold py-2 px-6 rounded-md shadow-sm flex items-center justify-center gap-2 transition-colors">
                        <i class="ph-bold ph-plus"></i>
                        Create Project
                    </button>

                    <div class="relative rounded-md shadow-sm w-full md:w-80">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="ph ph-magnifying-glass text-gray-400"></i>
                        </div>
                        <input type="text" id="search-input"
                            class="focus:ring-gsoc-green focus:border-gsoc-green block w-full pl-10 sm:text-sm border-gray-300 rounded-md py-2 border"
                            placeholder="Search projects or organizations...">
                    </div>
                </div>
            </div>

            <!-- Filter Tabs -->
            <div id="filter-container" class="flex gap-4 mt-6 overflow-x-auto pb-2 text-sm font-medium text-gray-500 border-b border-gray-100 scrollbar-hide">
                <!-- Buttons injected by JS -->
            </div>
        </div>
    </div>

    <!-- Projects Grid -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 flex-grow w-full">
        <!-- Empty State -->
        <div id="empty-state" class="hidden text-center py-20 bg-white rounded-lg border border-dashed border-gray-300">
            <div class="mx-auto h-12 w-12 text-gray-300">
                <i class="ph ph-folder-dashed text-5xl"></i>
            </div>
            <h3 class="mt-2 text-sm font-medium text-gray-900">No projects found</h3>
            <p id="empty-state-text" class="mt-1 text-sm text-gray-500">
                Try adjusting your search or filters.
            </p>
            <div id="empty-state-action" class="hidden mt-6">
                <button onclick="openCreateModal()" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gsoc-green hover:bg-green-600">
                    <i class="ph-bold ph-plus -ml-1 mr-2"></i> New Project
                </button>
            </div>
        </div>

        <!-- Grid Container -->
        <div id="projects-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Cards injected by JS -->
        </div>
    </main>

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

    <!-- Toast Notification Container -->
    <div id="toast-container" class="fixed bottom-4 right-4 z-[70] flex flex-col gap-2"></div>

    <!-- CREATE PROJECT MODAL -->
    <div id="modal-create" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-[60] flex items-center justify-center p-4">
        <div class="relative bg-white rounded-xl shadow-2xl max-w-lg w-full m-auto animate-fade-in-up">
            <div class="flex items-center justify-between p-5 border-b border-gray-100">
                <h3 class="text-xl font-bold text-gray-900">Create New Project</h3>
                <button onclick="closeModal('modal-create')" class="text-gray-400 hover:text-gray-600">
                    <i class="ph ph-x text-2xl"></i>
                </button>
            </div>
            <form id="form-create" class="p-6 space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Project Title</label>
                    <input name="title" required type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-gsoc-green focus:border-transparent" placeholder="e.g. Distributed Cache System">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Organization Name</label>
                    <input name="organization" required type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-gsoc-green focus:border-transparent" placeholder="e.g. Cloud Native Computing">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                    <textarea name="description" required rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-gsoc-green focus:border-transparent" placeholder="Describe the project goals and requirements..."></textarea>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Tags (comma separated)</label>
                    <input name="tags" type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-gsoc-green focus:border-transparent" placeholder="e.g. Python, Cloud, React">
                </div>
                <div class="pt-4 flex justify-end gap-3">
                    <button type="button" onclick="closeModal('modal-create')" class="px-4 py-2 bg-white text-gray-700 border border-gray-300 rounded-md hover:bg-gray-50 font-medium">Cancel</button>
                    <button type="submit" id="btn-submit-create" class="px-4 py-2 bg-gsoc-green text-white rounded-md hover:bg-green-600 font-medium flex items-center gap-2">Create Project</button>
                </div>
            </form>
        </div>
    </div>

    <!-- APPLY PROJECT MODAL -->
    <div id="modal-apply" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-[60] flex items-center justify-center p-4">
        <div class="relative bg-white rounded-xl shadow-2xl max-w-lg w-full m-auto animate-fade-in-up">
            <div class="flex items-center justify-between p-5 border-b border-gray-100">
                <div>
                    <h3 class="text-xl font-bold text-gray-900">Apply for Project</h3>
                    <p id="apply-project-title" class="text-sm text-gsoc-green font-medium">Project Name</p>
                </div>
                <button onclick="closeModal('modal-apply')" class="text-gray-400 hover:text-gray-600">
                    <i class="ph ph-x text-2xl"></i>
                </button>
            </div>
            <form id="form-apply" class="p-6 space-y-4">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">First Name</label>
                        <input name="firstName" required type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-gsoc-green">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Last Name</label>
                        <input name="lastName" required type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-gsoc-green">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                    <input name="email" required type="email" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-gsoc-green">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Why are you a good fit?</label>
                    <textarea name="pitch" required rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-gsoc-green" placeholder="Briefly describe your relevant skills..."></textarea>
                </div>
                <div class="pt-4 flex justify-end gap-3">
                    <button type="button" onclick="closeModal('modal-apply')" class="px-4 py-2 bg-white text-gray-700 border border-gray-300 rounded-md hover:bg-gray-50 font-medium">Cancel</button>
                    <button type="submit" id="btn-submit-apply" class="px-4 py-2 bg-gsoc-green text-white rounded-md hover:bg-green-600 font-medium flex items-center gap-2">Submit Application</button>
                </div>
            </form>
        </div>
    </div>

    <!-- VIEW APPLICATIONS MODAL -->
    <div id="modal-view-applications" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-[60] flex items-center justify-center p-4">
        <div class="relative bg-white rounded-xl shadow-2xl max-w-lg w-full m-auto animate-fade-in-up flex flex-col max-h-[90vh]">
            <div class="flex items-center justify-between p-5 border-b border-gray-100 flex-shrink-0">
                <div>
                    <h3 class="text-xl font-bold text-gray-900">Project Applicants</h3>
                    <p id="view-apps-project-title" class="text-sm text-gsoc-blue font-medium">Project Name</p>
                </div>
                <button onclick="closeModal('modal-view-applications')" class="text-gray-400 hover:text-gray-600">
                    <i class="ph ph-x text-2xl"></i>
                </button>
            </div>
            <div id="applications-list" class="p-6 space-y-4 overflow-y-auto flex-grow bg-gray-50">
                <!-- Applicants injected here -->
                <div class="text-center py-8">
                    <i class="ph ph-spinner animate-spin text-2xl text-gsoc-blue"></i>
                    <p class="text-sm text-gray-500 mt-2">Loading applications...</p>
                </div>
            </div>
            <div class="p-4 border-t border-gray-100 flex justify-end flex-shrink-0 bg-white rounded-b-xl">
                <button onclick="closeModal('modal-view-applications')" class="px-4 py-2 bg-white text-gray-700 border border-gray-300 rounded-md hover:bg-gray-50 font-medium">Close</button>
            </div>
        </div>
    </div>

    <!-- Main Logic -->
    <script type="module">
        // Import Firebase
        import { initializeApp } from 'https://www.gstatic.com/firebasejs/11.6.1/firebase-app.js';
        import { getAuth, signInAnonymously, onAuthStateChanged, signInWithCustomToken } from 'https://www.gstatic.com/firebasejs/11.6.1/firebase-auth.js';
        import { getFirestore, collection, addDoc, onSnapshot, serverTimestamp, query, where, doc, updateDoc } from 'https://www.gstatic.com/firebasejs/11.6.1/firebase-firestore.js';

        // -------------------------------------------------------------
        // MOCK DATABASE (For Local PHP Support)
        // -------------------------------------------------------------
        class MockService {
            constructor() {
                this.userId = 'local-user-' + Math.floor(Math.random() * 1000);
                if(!localStorage.getItem('slugworks_projects')) {
                    const seeds = [
                        {id: '1', title: 'Physics Engine 2.0', organization: 'Game Dev Alliance', description: 'Overhauling collision detection for mobile.', tags: ['C++', 'GameDev'], createdAt: Date.now()},
                        {id: '2', title: 'Accessible UI Kit', organization: 'Open Design Lib', description: 'React components compliant with WCAG 2.1.', tags: ['React', 'a11y'], createdAt: Date.now() - 10000}
                    ];
                    localStorage.setItem('slugworks_projects', JSON.stringify(seeds));
                }
            }

            getCurrentUser() { return { uid: this.userId, isAnonymous: true }; }

            subscribeProjects(callback) {
                const load = () => {
                    const data = JSON.parse(localStorage.getItem('slugworks_projects') || '[]');
                    data.sort((a,b) => b.createdAt - a.createdAt);
                    callback(data);
                };
                load();
                window.addEventListener('storage', load);
                const originalSetItem = localStorage.setItem;
                localStorage.setItem = function(key, value) {
                    originalSetItem.apply(this, arguments);
                    if(key === 'slugworks_projects') load();
                    if(key === 'slugworks_applications') window.dispatchEvent(new Event('storage_apps'));
                };
            }

            // Global applications subscription for counts
            subscribeAllApplications(callback) {
                const load = () => {
                    const apps = JSON.parse(localStorage.getItem('slugworks_applications') || '[]');
                    callback(apps);
                };
                load();
                window.addEventListener('storage_apps', load);
                window.addEventListener('storage', (e) => {
                    if (e.key === 'slugworks_applications') load();
                });
            }

            async addProject(data) {
                await new Promise(r => setTimeout(r, 800));
                const projects = JSON.parse(localStorage.getItem('slugworks_projects') || '[]');
                projects.push({ ...data, id: 'loc_' + Date.now(), createdAt: Date.now() });
                localStorage.setItem('slugworks_projects', JSON.stringify(projects));
            }

            async addApplication(data) {
                await new Promise(r => setTimeout(r, 800));
                const apps = JSON.parse(localStorage.getItem('slugworks_applications') || '[]');
                apps.push({ ...data, id: 'app_' + Date.now(), submittedAt: Date.now(), status: 'Pending' });
                localStorage.setItem('slugworks_applications', JSON.stringify(apps));
            }

            async updateApplicationStatus(appId, status) {
                await new Promise(r => setTimeout(r, 300));
                const apps = JSON.parse(localStorage.getItem('slugworks_applications') || '[]');
                const index = apps.findIndex(a => a.id === appId);
                if (index !== -1) {
                    apps[index].status = status;
                    localStorage.setItem('slugworks_applications', JSON.stringify(apps));
                    window.dispatchEvent(new Event('storage_apps'));
                }
            }
        }

        // -------------------------------------------------------------
        // UI HELPERS (Global Scope)
        // -------------------------------------------------------------
        let projects = [];
        let allApplications = []; // Global cache for counts
        let dataService = null;
        let activeFilter = 'All';
        let searchTerm = '';
        
        window.currentRole = 'student';
        
        window.showToast = (message, type = 'success') => {
            const container = document.getElementById('toast-container');
            const toast = document.createElement('div');
            const bgColor = type === 'success' ? 'bg-gray-900' : 'bg-red-600';
            const icon = type === 'success' ? 'ph-check-circle' : 'ph-warning-circle';
            toast.className = `${bgColor} text-white px-4 py-3 rounded-lg shadow-lg flex items-center gap-3 animate-slide-in-right min-w-[300px]`;
            toast.innerHTML = `<i class="ph-bold ${icon} text-xl text-green-400"></i><span class="font-medium text-sm">${message}</span>`;
            container.appendChild(toast);
            setTimeout(() => {
                toast.style.opacity = '0';
                toast.style.transform = 'translateY(10px)';
                setTimeout(() => toast.remove(), 300);
            }, 3000);
        };

        const getProjectStats = (projectId) => {
            const projectApps = allApplications.filter(a => a.projectId === projectId);
            const accepted = projectApps.filter(a => a.status === 'Accepted').length;
            return {
                total: projectApps.length,
                accepted: accepted
            };
        };

        const renderProjects = () => {
            const grid = document.getElementById('projects-grid');
            const emptyState = document.getElementById('empty-state');
            
            const filtered = projects.filter(p => {
                const matchesSearch = (p.title || '').toLowerCase().includes(searchTerm) || (p.organization || '').toLowerCase().includes(searchTerm);
                const matchesFilter = activeFilter === 'All' || (p.tags && p.tags.some(tag => tag.toLowerCase().includes(activeFilter.toLowerCase())));
                return matchesSearch && matchesFilter;
            });

            if (filtered.length === 0) {
                grid.innerHTML = '';
                emptyState.classList.remove('hidden');
                document.getElementById('empty-state-text').innerText = window.currentRole === 'host' ? 'Get started by creating a new project.' : 'Try adjusting your search or filters.';
                if(window.currentRole === 'host') document.getElementById('empty-state-action').classList.remove('hidden');
                else document.getElementById('empty-state-action').classList.add('hidden');
                return;
            }
            emptyState.classList.add('hidden');
            
            grid.innerHTML = filtered.map(project => {
                const t = (project.title || '').toLowerCase();
                let icon = 'ph-code', bg = 'bg-gray-100', text = 'text-gray-600';
                if (t.includes('game') || t.includes('physics')) { icon = 'ph-game-controller'; bg = 'bg-purple-100'; text = 'text-purple-600'; }
                else if (t.includes('data') || t.includes('etl')) { icon = 'ph-chart-line-up'; bg = 'bg-red-100'; text = 'text-red-600'; }
                else if (t.includes('ui') || t.includes('accessible')) { icon = 'ph-robot'; bg = 'bg-yellow-100'; text = 'text-yellow-600'; }
                else if (t.includes('cloud')) { icon = 'ph-brackets-angle'; bg = 'bg-blue-100'; text = 'text-blue-600'; }

                const tagsHtml = (project.tags || []).map(tag => `<span class="bg-gray-100 text-gray-600 text-xs px-2 py-1 rounded-full font-medium">${tag}</span>`).join('');
                
                // Stats Logic
                const stats = getProjectStats(project.id);
                const statsHtml = `<div class="flex items-center gap-3 text-xs text-gray-500 font-medium mt-3 pt-3 border-t border-gray-100 w-full">
                    <span class="flex items-center gap-1"><i class="ph-bold ph-users"></i> ${stats.total} Applied</span>
                    <span class="flex items-center gap-1 text-gsoc-green"><i class="ph-bold ph-check-circle"></i> ${stats.accepted} Joined</span>
                </div>`;
                
                return `
                <div class="project-card bg-white rounded-lg p-6 flex flex-col h-full border border-gray-200 hover:border-gsoc-green">
                    <div class="flex items-start justify-between mb-4">
                        <div class="w-10 h-10 rounded ${bg} flex items-center justify-center ${text}"><i class="ph ${icon} text-xl"></i></div>
                        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-green-100 text-green-800">Open</span>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-1 line-clamp-1">${project.title}</h3>
                    <p class="text-sm text-gsoc-green font-medium mb-3">${project.organization}</p>
                    <p class="text-gray-500 text-sm mb-4 flex-grow line-clamp-3">${project.description}</p>
                    <div class="flex flex-wrap gap-2 mb-2">${tagsHtml}</div>
                    
                    ${statsHtml}

                    <div class="mt-4">
                        ${window.currentRole === 'student' ? 
                            `<button onclick="openApplyModal('${project.id}', '${(project.title || '').replace(/'/g, "\\'")}')" class="w-full bg-gsoc-green hover:bg-green-600 text-white text-sm font-medium px-4 py-2 rounded-md transition-colors flex items-center justify-center gap-2">Apply Now <i class="ph ph-arrow-right"></i></button>` : 
                            `<button onclick="openViewApplications('${project.id}', '${(project.title || '').replace(/'/g, "\\'")}')" class="w-full bg-white border border-gsoc-blue text-gsoc-blue hover:bg-blue-50 text-sm font-bold px-4 py-2 rounded-md transition-colors flex items-center justify-center gap-2"><i class="ph-bold ph-users"></i> Manage Applicants (${stats.total})</button>`}
                    </div>
                </div>`;
            }).join('');
        };

        const updateUI = () => {
            const isHost = window.currentRole === 'host';
            const btnStudent = document.getElementById('btn-role-student');
            const btnHost = document.getElementById('btn-role-host');
            
            if (isHost) {
                btnHost.className = "px-3 py-1.5 text-sm font-medium rounded-md transition-all bg-white text-gsoc-blue shadow-sm";
                btnStudent.className = "px-3 py-1.5 text-sm font-medium rounded-md transition-all text-gray-500 hover:text-gray-700";
            } else {
                btnStudent.className = "px-3 py-1.5 text-sm font-medium rounded-md transition-all bg-white text-gsoc-green shadow-sm";
                btnHost.className = "px-3 py-1.5 text-sm font-medium rounded-md transition-all text-gray-500 hover:text-gray-700";
            }
            
            document.getElementById('page-title').innerText = isHost ? 'Manage Projects' : 'Approved Projects';
            document.getElementById('page-desc').innerText = isHost ? 'Create and manage opportunities for this summer.' : 'Discover the incredible work done by students this summer.';
            
            if(isHost) {
                document.getElementById('host-badge').classList.remove('hidden');
                document.getElementById('btn-create-project-hero').classList.remove('hidden');
            } else {
                document.getElementById('host-badge').classList.add('hidden');
                document.getElementById('btn-create-project-hero').classList.add('hidden');
            }
            renderProjects();
        };

        window.setRole = (newRole) => { window.currentRole = newRole; updateUI(); };
        window.openCreateModal = () => document.getElementById('modal-create').classList.remove('hidden');
        window.openApplyModal = (id, title) => {
            window.applyProjectId = id;
            window.applyProjectTitle = title;
            document.getElementById('apply-project-title').innerText = title;
            document.getElementById('modal-apply').classList.remove('hidden');
        };
        
        // VIEW APPLICATIONS LOGIC
        window.openViewApplications = (projectId, projectTitle) => {
            document.getElementById('view-apps-project-title').innerText = projectTitle;
            
            // Filter local apps directly since we have them in memory now
            const apps = allApplications.filter(a => a.projectId === projectId);
            // Sort by Date
            apps.sort((a,b) => {
                 const dA = a.submittedAt?.toMillis ? a.submittedAt.toMillis() : a.submittedAt;
                 const dB = b.submittedAt?.toMillis ? b.submittedAt.toMillis() : b.submittedAt;
                 return dB - dA;
            });

            const list = document.getElementById('applications-list');
            document.getElementById('modal-view-applications').classList.remove('hidden');

            if (apps.length === 0) {
                list.innerHTML = `
                    <div class="text-center py-8">
                        <div class="mx-auto h-12 w-12 text-gray-300 bg-white rounded-full flex items-center justify-center mb-2">
                            <i class="ph ph-users text-2xl"></i>
                        </div>
                        <p class="text-sm text-gray-500">No applications yet.</p>
                    </div>`;
                return;
            }
            
            list.innerHTML = apps.map(app => {
                const dateVal = app.submittedAt?.toMillis ? app.submittedAt.toMillis() : app.submittedAt;
                const date = new Date(dateVal);
                const status = app.status || 'Pending';
                
                let statusHtml = '';
                if(status === 'Accepted') {
                    statusHtml = `<span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs font-bold border border-green-200 flex items-center gap-1"><i class="ph-bold ph-check"></i> Accepted</span>`;
                } else if (status === 'Rejected') {
                    statusHtml = `<span class="px-3 py-1 bg-red-100 text-red-700 rounded-full text-xs font-bold border border-red-200 flex items-center gap-1"><i class="ph-bold ph-x"></i> Rejected</span>`;
                } else {
                    statusHtml = `
                        <button onclick="updateStatus('${app.id}', 'Accepted')" class="px-3 py-1 bg-green-50 text-green-600 hover:bg-green-100 border border-green-200 rounded text-xs font-bold transition">Accept</button>
                        <button onclick="updateStatus('${app.id}', 'Rejected')" class="px-3 py-1 bg-red-50 text-red-600 hover:bg-red-100 border border-red-200 rounded text-xs font-bold transition">Reject</button>
                    `;
                }

                return `
                <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm hover:shadow-md transition-all">
                    <div class="flex justify-between items-start mb-2">
                        <div>
                            <div class="flex items-center gap-2">
                                <h4 class="font-bold text-gray-900">${app.applicantName}</h4>
                                <span class="text-xs bg-gray-100 text-gray-500 px-1.5 rounded">Applicant</span>
                            </div>
                            <a href="mailto:${app.applicantEmail}" class="text-sm text-gsoc-blue hover:underline flex items-center gap-1">
                                <i class="ph-fill ph-envelope"></i> ${app.applicantEmail}
                            </a>
                        </div>
                        <span class="text-xs text-gray-400 font-mono bg-gray-50 px-2 py-1 rounded">${date.toLocaleDateString()}</span>
                    </div>
                    <div class="bg-gray-50 rounded p-3 text-sm text-gray-700 mt-2 border border-gray-100">
                        <p class="font-bold text-xs text-gray-400 uppercase mb-1 tracking-wider">Pitch</p>
                        <p class="italic">"${app.pitch}"</p>
                    </div>
                    <div class="mt-3 flex justify-between items-center border-t border-gray-50 pt-3">
                        <span class="text-xs text-gray-400 font-medium">Status:</span>
                        <div class="flex gap-2">
                            ${statusHtml}
                        </div>
                    </div>
                </div>`;
            }).join('');
        };

        window.updateStatus = async (appId, status) => {
            try {
                await dataService.updateApplicationStatus(appId, status);
                window.showToast(`Application marked as ${status}`);
                // Re-render modal current view hackily by finding the project title again
                // In a real framework we'd have reactive state. Here we rely on global refresh.
                // The global listener will update `allApplications`, then we can re-open.
                // Or just close/reopen? A bit jarring.
                // Let's rely on the real-time update trigger to redraw the grid, 
                // but for the modal we might need to manually refresh if it's open.
                // Since this is Vanilla JS with globals:
                const projectTitle = document.getElementById('view-apps-project-title').innerText;
                const app = allApplications.find(a => a.id === appId);
                if(app) setTimeout(() => openViewApplications(app.projectId, projectTitle), 100); 
            } catch(e) {
                console.error(e);
                window.showToast("Failed to update status", "error");
            }
        };

        window.closeModal = (id) => {
            document.getElementById(id).classList.add('hidden');
        };

        // Filters & Search
        const categories = ['All', 'Web', 'AI', 'Cloud', 'Mobile', 'GameDev'];
        document.getElementById('filter-container').innerHTML = categories.map(cat => `<button onclick="setFilter('${cat}')" class="pb-2 whitespace-nowrap transition-colors ${activeFilter === cat ? 'text-gsoc-green border-b-2 border-gsoc-green' : 'hover:text-gray-700 border-b-2 border-transparent hover:border-gray-200'}">${cat === 'All' ? 'All Projects' : cat}</button>`).join('');
        window.setFilter = (cat) => { activeFilter = cat; document.getElementById('filter-container').innerHTML = categories.map(c => `<button onclick="setFilter('${c}')" class="pb-2 whitespace-nowrap transition-colors ${activeFilter === c ? 'text-gsoc-green border-b-2 border-gsoc-green' : 'hover:text-gray-700 border-b-2 border-transparent hover:border-gray-200'}">${c === 'All' ? 'All Projects' : c}</button>`).join(''); renderProjects(); };
        document.getElementById('search-input').addEventListener('input', (e) => { searchTerm = e.target.value.toLowerCase(); renderProjects(); });

        // -------------------------------------------------------------
        // INIT (Decision Logic)
        // -------------------------------------------------------------
        async function initApp() {
            let useFirebase = false;

            // Check if environment config exists
            if (typeof __firebase_config !== 'undefined') {
                try {
                    const config = JSON.parse(__firebase_config);
                    const app = initializeApp(config);
                    const auth = getAuth(app);
                    const db = getFirestore(app);
                    const appId = typeof __app_id !== 'undefined' ? __app_id : 'default-app-id';

                    // Authenticate
                    if (typeof __initial_auth_token !== 'undefined' && __initial_auth_token) {
                        await signInWithCustomToken(auth, __initial_auth_token);
                    } else {
                        await signInAnonymously(auth);
                    }
                    
                    // Create wrapper for consistent API
                    dataService = {
                        getCurrentUser: () => auth.currentUser,
                        subscribeProjects: (cb) => {
                            onSnapshot(collection(db, 'artifacts', appId, 'public', 'data', 'projects'), (snap) => {
                                const data = snap.docs.map(d => ({id: d.id, ...d.data()}));
                                data.sort((a,b) => (b.createdAt?.toMillis() || 0) - (a.createdAt?.toMillis() || 0));
                                cb(data);
                            });
                        },
                        subscribeAllApplications: (cb) => {
                            onSnapshot(collection(db, 'artifacts', appId, 'public', 'data', 'applications'), (snap) => {
                                const data = snap.docs.map(d => ({id: d.id, ...d.data()}));
                                cb(data);
                            });
                        },
                        addProject: async (data) => {
                            await addDoc(collection(db, 'artifacts', appId, 'public', 'data', 'projects'), { ...data, createdAt: serverTimestamp() });
                        },
                        addApplication: async (data) => {
                            // Default status for new applications
                            await addDoc(collection(db, 'artifacts', appId, 'public', 'data', 'applications'), { ...data, status: 'Pending', submittedAt: serverTimestamp() });
                        },
                        updateApplicationStatus: async (appId, status) => {
                             const ref = doc(db, 'artifacts', appId, 'public', 'data', 'applications', appId);
                             await updateDoc(ref, { status: status });
                        }
                    };
                    useFirebase = true;
                } catch(e) { console.warn("Firebase Init Error:", e); }
            }

            if (!useFirebase) {
                // Fallback to Mock Service (Local Storage)
                console.log("Initializing Mock Service for PHP/Local Environment");
                dataService = new MockService();
                document.getElementById('demo-badge').classList.remove('hidden');
                window.showToast("Demo Mode: Data saved to browser storage", "success");
            }

            // Start Listening for Data
            dataService.subscribeProjects((data) => {
                projects = data;
                renderProjects();
            });

            // Start Listening for Counts
            dataService.subscribeAllApplications((apps) => {
                allApplications = apps;
                renderProjects();
                
                // If modal is open, refresh it
                const modal = document.getElementById('modal-view-applications');
                if(!modal.classList.contains('hidden')) {
                    const projectTitle = document.getElementById('view-apps-project-title').innerText;
                    // Find a project ID based on title... risky but works for simple demo
                    // Better to store current open project ID in variable
                    const sampleApp = apps.find(a => a.projectTitle === projectTitle); // This might fail if no apps yet or title changed
                    // Actually we can infer from the current list... 
                    // Let's rely on global state:
                    // window.applyProjectId is for applying...
                    // Let's just do nothing, user will see updates on next open or if they interact.
                    // Actually, let's use a stored ID for the open view modal
                    if(window.currentViewProjectId) {
                        openViewApplications(window.currentViewProjectId, projectTitle);
                    }
                }
            });
        }

        // Global var to track open modal
        window.currentViewProjectId = null;
        const originalOpenView = window.openViewApplications;
        window.openViewApplications = (pid, title) => {
            window.currentViewProjectId = pid;
            originalOpenView(pid, title);
        }
        const originalClose = window.closeModal;
        window.closeModal = (id) => {
            if(id === 'modal-view-applications') window.currentViewProjectId = null;
            originalClose(id);
        }


        // -------------------------------------------------------------
        // FORM SUBMISSIONS
        // -------------------------------------------------------------
        document.getElementById('form-create').addEventListener('submit', async (e) => {
            e.preventDefault();
            const btn = document.getElementById('btn-submit-create');
            btn.innerText = 'Creating...'; btn.disabled = true;

            const formData = new FormData(e.target);
            const tags = formData.get('tags').split(',').map(tag => tag.trim()).filter(t => t);
            const currentUser = dataService.getCurrentUser();

            try {
                await dataService.addProject({
                    title: formData.get('title'),
                    organization: formData.get('organization'),
                    description: formData.get('description'),
                    tags: tags,
                    hostId: currentUser ? currentUser.uid : 'anon',
                    status: 'Open'
                });
                window.closeModal('modal-create');
                e.target.reset();
                window.showToast('Project created successfully!');
            } catch (err) {
                console.error(err);
                window.showToast('Error creating project', 'error');
            } finally {
                btn.innerText = 'Create Project'; btn.disabled = false;
            }
        });

        document.getElementById('form-apply').addEventListener('submit', async (e) => {
            e.preventDefault();
            const btn = document.getElementById('btn-submit-apply');
            btn.innerText = 'Submitting...'; btn.disabled = true;
            const formData = new FormData(e.target);
            const currentUser = dataService.getCurrentUser();

            try {
                await dataService.addApplication({
                    projectId: window.applyProjectId,
                    projectTitle: window.applyProjectTitle,
                    applicantName: `${formData.get('firstName')} ${formData.get('lastName')}`,
                    applicantEmail: formData.get('email'),
                    pitch: formData.get('pitch'),
                    applicantId: currentUser ? currentUser.uid : 'anon'
                });
                window.closeModal('modal-apply');
                e.target.reset();
                window.showToast(`Application sent!`);
            } catch (err) {
                console.error(err);
                window.showToast('Error submitting application', 'error');
            } finally {
                btn.innerText = 'Submit Application'; btn.disabled = false;
            }
        });

        // Run
        initApp();
        updateUI();

    </script>
</body>
</html>