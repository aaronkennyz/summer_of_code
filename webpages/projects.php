<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projects - Slugworks Summer of Code</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">

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

    <nav class="bg-white shadow-sm fixed w-full z-50 h-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="../index.php" class="flex-shrink-0 flex items-center gap-2 cursor-pointer group">
                        <div class="w-10 h-10 bg-gsoc-green rounded-full flex items-center justify-center text-white group-hover:bg-green-600 transition">
                            <i class="ph ph-arrow-left text-xl"></i>
                        </div>
                        <span class="font-medium text-xl text-gray-800 tracking-tight">Back to <span class="font-bold text-gsoc-green">Home</span></span>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <div class="bg-white border-b border-gray-200 pt-24 pb-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
                <div>
                    <div class="flex items-center gap-3 mb-2">
                        <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight sm:text-4xl">
                            Approved Projects
                        </h1>
                        <span id="demo-badge" class="hidden bg-gray-100 text-gray-600 text-xs font-bold px-2.5 py-0.5 rounded border border-gray-200">LOCAL DEMO</span>
                    </div>
                    <p class="text-lg text-gray-500">
                        Discover the incredible work done by students this summer.
                    </p>
                </div>

                <div class="flex flex-col gap-3 w-full md:w-auto items-end">
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

            <div id="filter-container" class="flex gap-4 mt-6 overflow-x-auto pb-2 text-sm font-medium text-gray-500 border-b border-gray-100 scrollbar-hide">
                </div>
        </div>
    </div>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 flex-grow w-full">
        <div id="empty-state" class="hidden text-center py-20 bg-white rounded-lg border border-dashed border-gray-300">
            <div class="mx-auto h-12 w-12 text-gray-300">
                <i class="ph ph-folder-dashed text-5xl"></i>
            </div>
            <h3 class="mt-2 text-sm font-medium text-gray-900">No projects found</h3>
            <p class="mt-1 text-sm text-gray-500">
                Try adjusting your search or filters.
            </p>
        </div>

        <div id="projects-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            </div>
    </main>

    <footer class="bg-white border-t border-gray-200 mt-auto py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="flex items-center justify-center gap-2 mb-4 text-gray-600">
                <i class="ph ph-code text-xl"></i>
                <span class="font-bold">Slugworks Open Source</span>
            </div>
            <p class="text-sm text-gray-500">&copy; Slugworks 2025-2026</p>
        </div>
    </footer>

    <div id="toast-container" class="fixed bottom-4 right-4 z-[70] flex flex-col gap-2"></div>

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

    <script type="module">
        // Import Firebase
        import { initializeApp } from 'https://www.gstatic.com/firebasejs/11.6.1/firebase-app.js';
        import { getAuth, signInAnonymously, signInWithCustomToken } from 'https://www.gstatic.com/firebasejs/11.6.1/firebase-auth.js';
        import { getFirestore, collection, addDoc, onSnapshot, serverTimestamp, doc, updateDoc } from 'https://www.gstatic.com/firebasejs/11.6.1/firebase-firestore.js';

        // -------------------------------------------------------------
        // MOCK DATABASE (For Local PHP Support)
        // -------------------------------------------------------------
        class MockService {
            constructor() {
                this.userId = 'student-' + Math.floor(Math.random() * 1000);
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
            }

            // Global applications subscription for counts
            subscribeAllApplications(callback) {
                const load = () => {
                    const apps = JSON.parse(localStorage.getItem('slugworks_applications') || '[]');
                    callback(apps);
                };
                load();
                window.addEventListener('storage', (e) => {
                    if (e.key === 'slugworks_applications') load();
                });
            }

            async addApplication(data) {
                await new Promise(r => setTimeout(r, 800));
                const apps = JSON.parse(localStorage.getItem('slugworks_applications') || '[]');
                apps.push({ ...data, id: 'app_' + Date.now(), submittedAt: Date.now(), status: 'Pending' });
                localStorage.setItem('slugworks_applications', JSON.stringify(apps));
                // Trigger event for same-window updates
                window.dispatchEvent(new Event('storage'));
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
                         <button onclick="openApplyModal('${project.id}', '${(project.title || '').replace(/'/g, "\\'")}')" class="w-full bg-gsoc-green hover:bg-green-600 text-white text-sm font-medium px-4 py-2 rounded-md transition-colors flex items-center justify-center gap-2">Apply Now <i class="ph ph-arrow-right"></i></button>
                    </div>
                </div>`;
            }).join('');
        };

        window.openApplyModal = (id, title) => {
            window.applyProjectId = id;
            window.applyProjectTitle = title;
            document.getElementById('apply-project-title').innerText = title;
            document.getElementById('modal-apply').classList.remove('hidden');
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
                        addApplication: async (data) => {
                            // Default status for new applications
                            await addDoc(collection(db, 'artifacts', appId, 'public', 'data', 'applications'), { ...data, status: 'Pending', submittedAt: serverTimestamp() });
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
            });
        }

        // -------------------------------------------------------------
        // FORM SUBMISSIONS
        // -------------------------------------------------------------
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

    </script>
</body>
</html>