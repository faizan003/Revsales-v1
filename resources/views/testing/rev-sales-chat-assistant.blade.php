<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RevAI Assistant - Sales Chat</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/@heroicons/ui@1.0.1/outline/index.css" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'brand-blue': '#2563eb',
                        'brand-green': '#10b981',
                        'brand-gray': '#64748b',
                        'surface': '#fafafa',
                        'surface-dark': '#f1f5f9'
                    }
                }
            }
        }
    </script>
    <style>
        /* Custom scrollbar */
        .chat-scroll::-webkit-scrollbar {
            width: 4px;
        }
        .chat-scroll::-webkit-scrollbar-track {
            background: transparent;
        }
        .chat-scroll::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 2px;
        }
        .chat-scroll::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }
        
        /* Message animations */
        @keyframes slideUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .message-enter {
            animation: slideUp 0.3s ease-out;
        }
        
        /* Typing indicator animation */
        .typing-dot {
            animation: typing 1.4s infinite;
        }
        .typing-dot:nth-child(2) { animation-delay: 0.2s; }
        .typing-dot:nth-child(3) { animation-delay: 0.4s; }
        
        @keyframes typing {
            0%, 60%, 100% { transform: translateY(0); }
            30% { transform: translateY(-10px); }
        }
    </style>
</head>
<body class="bg-surface font-sans antialiased">
    <div x-data="chatAssistant()" class="h-screen flex flex-col max-w-4xl mx-auto bg-white shadow-2xl lg:my-4 lg:rounded-2xl lg:overflow-hidden">
        
        <!-- Header -->
        <header class="bg-gradient-to-r from-slate-50 to-blue-50 border-b border-slate-200 p-3 lg:p-4">
            <div class="flex items-center justify-between">
                <!-- Bot Info -->
                <div class="flex items-center space-x-2">
                    <div class="relative">
                        <div class="w-10 h-10 bg-gradient-to-br from-brand-blue to-purple-600 rounded-xl flex items-center justify-center shadow-lg">
                            <!-- AI Brain Icon -->
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                            </svg>
                        </div>
                        <div class="absolute -bottom-1 -right-1 w-3 h-3 bg-green-400 rounded-full border-2 border-white"></div>
                    </div>
                    <div>
                        <h1 class="text-base font-semibold text-slate-900">RevAI Assistant</h1>
                        <p class="text-xs text-slate-500 font-medium" x-text="currentDate">Today, 15 July 2024</p>
                    </div>
                </div>
                
                <!-- Points Gamification -->
                <div class="bg-gradient-to-r from-slate-50 to-blue-50 rounded-xl px-3 py-2 shadow-sm border border-slate-200 hover:shadow-md transition-all duration-200">
                    <div class="flex items-center space-x-2">
                        <div class="w-6 h-6 bg-gradient-to-br from-blue-500 to-purple-600 rounded-lg flex items-center justify-center">
                            <span class="text-xs text-white font-semibold">🎯</span>
                        </div>
                        <div class="flex items-baseline space-x-1">
                            <span class="text-lg font-bold text-slate-800" x-text="pointsToday">85</span>
                            <span class="text-xs font-medium text-slate-600">pts</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Conversation Started Label -->
        <div class="px-4 py-3 bg-slate-50 border-b border-slate-100">
            <div class="text-center">
                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-slate-200 text-slate-700">
                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Conversation started today at <span x-text="startTime">2:30 PM IST</span>
                </span>
            </div>
        </div>

        <!-- Chat Messages Area -->
        <div class="flex-1 overflow-y-auto chat-scroll p-4 space-y-6" x-ref="chatContainer">
            
            <!-- Welcome Message -->
            <div class="flex items-start space-x-3 message-enter">
                <div class="flex-shrink-0">
                    <div class="w-8 h-8 bg-gradient-to-br from-brand-green to-emerald-600 rounded-lg flex items-center justify-center">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                        </svg>
                    </div>
                </div>
                <div class="flex-1 max-w-md">
                    <div class="bg-gradient-to-r from-green-50 to-emerald-50 border border-green-200 rounded-2xl rounded-tl-md p-4">
                        <p class="text-slate-800 text-sm leading-relaxed">
                            Hey there! 👋 I'm your RevAI Assistant. I can help you manage leads, schedule follow-ups, create email drafts, and boost your sales productivity. Just tell me what you need!
                        </p>
                        <div class="mt-3">
                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700">
                                <span class="w-2 h-2 bg-green-400 rounded-full mr-1"></span>
                                System Message
                            </span>
                        </div>
                    </div>
                    <div class="mt-1 ml-2">
                        <span class="text-xs text-slate-400">2:30 PM</span>
                    </div>
                </div>
            </div>

            <!-- Sample User Message -->
            <div class="flex justify-end message-enter">
                <div class="max-w-md">
                    <div class="bg-gradient-to-r from-brand-blue to-blue-600 text-white rounded-2xl rounded-tr-md p-4 shadow-sm">
                        <p class="text-sm leading-relaxed">Follow up with Aditya about the enterprise demo. He seemed interested but hasn't responded to my last email.</p>
                    </div>
                    <div class="mt-1 mr-2 text-right">
                        <span class="text-xs text-slate-400">2:31 PM</span>
                    </div>
                </div>
            </div>

            <!-- AI Response with Actions -->
            <div class="flex items-start space-x-3 message-enter">
                <div class="flex-shrink-0">
                    <div class="w-8 h-8 bg-gradient-to-br from-brand-green to-emerald-600 rounded-lg flex items-center justify-center">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                </div>
                <div class="flex-1 max-w-md">
                    <div class="bg-white border border-slate-200 rounded-2xl rounded-tl-md p-4 shadow-sm">
                        <p class="text-slate-800 text-sm leading-relaxed mb-3">
                            Perfect! I've analyzed Aditya's engagement pattern. Here's what I recommend:
                        </p>
                        <div class="space-y-2">
                            <div class="flex items-center space-x-2 p-2 bg-blue-50 rounded-lg">
                                <span class="text-blue-600">✉️</span>
                                <span class="text-sm text-slate-700">Personalized follow-up email drafted</span>
                            </div>
                            <div class="flex items-center space-x-2 p-2 bg-amber-50 rounded-lg">
                                <span class="text-amber-600">📅</span>
                                <span class="text-sm text-slate-700">Follow-up scheduled for tomorrow 10 AM</span>
                            </div>
                            <div class="flex items-center space-x-2 p-2 bg-purple-50 rounded-lg">
                                <span class="text-purple-600">⏰</span>
                                <span class="text-sm text-slate-700">Optimal timing based on his activity</span>
                            </div>
                        </div>
                    </div>
                    <div class="mt-1 ml-2">
                        <span class="text-xs text-slate-400">2:31 PM</span>
                    </div>
                </div>
            </div>

            <!-- Another User Message -->
            <div class="flex justify-end message-enter">
                <div class="max-w-md">
                    <div class="bg-gradient-to-r from-brand-blue to-blue-600 text-white rounded-2xl rounded-tr-md p-4 shadow-sm">
                        <p class="text-sm leading-relaxed">Great! Can you also add Mr. Rajesh from TechCorp as a new lead? He expressed interest during yesterday's networking event.</p>
                    </div>
                    <div class="mt-1 mr-2 text-right">
                        <span class="text-xs text-slate-400">2:33 PM</span>
                    </div>
                </div>
            </div>

            <!-- Typing Indicator (conditionally shown) -->
            <div x-show="isTyping" class="flex items-start space-x-3 message-enter">
                <div class="flex-shrink-0">
                    <div class="w-8 h-8 bg-gradient-to-br from-brand-green to-emerald-600 rounded-lg flex items-center justify-center">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                        </svg>
                    </div>
                </div>
                <div class="bg-white border border-slate-200 rounded-2xl rounded-tl-md p-4 shadow-sm">
                    <div class="flex space-x-1">
                        <div class="w-2 h-2 bg-slate-400 rounded-full typing-dot"></div>
                        <div class="w-2 h-2 bg-slate-400 rounded-full typing-dot"></div>
                        <div class="w-2 h-2 bg-slate-400 rounded-full typing-dot"></div>
                    </div>
                </div>
            </div>

            <!-- Dynamic Messages -->
            <template x-for="(message, index) in messages" :key="index">
                <div :class="message.type === 'user' ? 'flex justify-end' : 'flex items-start space-x-3'" class="message-enter">
                    <!-- AI Avatar (only for AI messages) -->
                    <div x-show="message.type === 'ai'" class="flex-shrink-0">
                        <div class="w-8 h-8 bg-gradient-to-br from-brand-green to-emerald-600 rounded-lg flex items-center justify-center">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                    </div>
                    
                    <div class="max-w-md">
                        <div 
                            :class="message.type === 'user' 
                                ? 'bg-gradient-to-r from-brand-blue to-blue-600 text-white rounded-2xl rounded-tr-md' 
                                : 'bg-white border border-slate-200 rounded-2xl rounded-tl-md'"
                            class="p-4 shadow-sm"
                        >
                            <p class="text-sm leading-relaxed" :class="message.type === 'user' ? 'text-white' : 'text-slate-800'" x-text="message.content"></p>
                            
                            <!-- Actions for AI messages -->
                            <div x-show="message.type === 'ai' && message.actions" class="mt-3 space-y-2">
                                <template x-for="action in message.actions">
                                    <div class="flex items-center space-x-2 p-2 bg-blue-50 rounded-lg">
                                        <span x-text="action.icon"></span>
                                        <span class="text-sm text-slate-700" x-text="action.text"></span>
                                    </div>
                                </template>
                            </div>
                        </div>
                        <div class="mt-1" :class="message.type === 'user' ? 'mr-2 text-right' : 'ml-2'">
                            <span class="text-xs text-slate-400" x-text="message.timestamp"></span>
                        </div>
                    </div>
                </div>
            </template>
        </div>

        <!-- Message Input -->
        <div class="bg-white border-t border-slate-200 p-4">
            <div class="flex items-end">
                <!-- Text Input Area -->
                <div class="flex-1 relative">
                    <textarea 
                        x-model="newMessage"
                        @keydown.enter.prevent="sendMessage()"
                        @input="autoResize($event)"
                        placeholder="Ask me to follow up with a lead, create tasks, or anything sales related..."
                        class="w-full p-4 pr-24 bg-slate-50 border border-slate-200 rounded-xl resize-none focus:outline-none focus:ring-2 focus:ring-brand-blue focus:border-transparent placeholder-slate-400 text-sm leading-relaxed max-h-32"
                        rows="1"
                    ></textarea>
                    
                    <!-- Voice Input Button -->
                    <button @click="toggleVoiceInput()" 
                            :class="isListening ? 'bg-red-100 hover:bg-red-200' : 'bg-slate-100 hover:bg-slate-200'"
                            class="absolute right-12 bottom-2 p-2.5 rounded-lg transition-all duration-200 group">
                        <svg :class="isListening ? 'text-red-600' : 'text-slate-600'" class="w-4 h-4 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z" />
                        </svg>
                    </button>
                    
                    <!-- Send Button -->
                    <button 
                        @click="sendMessage()"
                        :disabled="!newMessage.trim()"
                        :class="newMessage.trim() ? 'bg-brand-blue hover:bg-blue-700 text-white' : 'bg-slate-200 text-slate-400 cursor-not-allowed'"
                        class="absolute right-2 bottom-2 p-2.5 rounded-lg transition-all duration-200"
                    >
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function chatAssistant() {
            return {
                pointsToday: 85,
                startTime: new Date().toLocaleTimeString('en-IN', {
                    hour: '2-digit', 
                    minute:'2-digit',
                    timeZone: 'Asia/Kolkata'
                }),
                currentDate: new Date().toLocaleDateString('en-IN', {
                    weekday: 'long',
                    day: 'numeric',
                    month: 'long',
                    year: 'numeric',
                    timeZone: 'Asia/Kolkata'
                }),
                newMessage: '',
                isTyping: false,
                isListening: false,
                messages: [],

                init() {
                    this.scrollToBottom();
                },

                sendMessage() {
                    if (!this.newMessage.trim()) return;

                    // Add user message
                    this.messages.push({
                        type: 'user',
                        content: this.newMessage,
                        timestamp: new Date().toLocaleTimeString('en-IN', {
                            hour: '2-digit', 
                            minute:'2-digit',
                            timeZone: 'Asia/Kolkata'
                        })
                    });

                    const userMessage = this.newMessage;
                    this.newMessage = '';

                    // Show typing indicator
                    this.isTyping = true;
                    this.scrollToBottom();

                    // Simulate AI response
                    setTimeout(() => {
                        this.isTyping = false;
                        this.addAIResponse(userMessage);
                        this.pointsToday += Math.floor(Math.random() * 10) + 5; // Gamification
                    }, 1500);
                },

                addAIResponse(userMessage) {
                    let response = {
                        type: 'ai',
                        content: this.generateResponse(userMessage),
                        timestamp: new Date().toLocaleTimeString('en-IN', {
                            hour: '2-digit', 
                            minute:'2-digit',
                            timeZone: 'Asia/Kolkata'
                        }),
                        actions: this.generateActions(userMessage)
                    };

                    this.messages.push(response);
                    this.scrollToBottom();
                },

                generateResponse(message) {
                    const responses = [
                        "I've analyzed your request and prepared the best course of action for you.",
                        "Perfect! I've got everything set up to help you close this deal.",
                        "Great choice! I've optimized the timing and approach based on historical data.",
                        "Excellent! I've created a personalized strategy for this prospect.",
                        "Smart move! I've prepared multiple touchpoints to maximize your success rate."
                    ];
                    return responses[Math.floor(Math.random() * responses.length)];
                },

                generateActions(message) {
                    const actionSets = [
                        [
                            { icon: '✉️', text: 'Personalized email drafted' },
                            { icon: '📅', text: 'Follow-up scheduled' }
                        ],
                        [
                            { icon: '📊', text: 'Lead profile updated' },
                            { icon: '⏰', text: 'Optimal timing calculated' }
                        ],
                        [
                            { icon: '🎯', text: 'Action plan created' },
                            { icon: '📈', text: 'Success probability: 78%' }
                        ]
                    ];
                    return actionSets[Math.floor(Math.random() * actionSets.length)];
                },

                quickAction(type) {
                    const actions = {
                        lead: "Add a new lead to my pipeline",
                        followup: "Schedule a follow-up call",
                        email: "Draft a professional email",
                        analytics: "Show me today's performance metrics"
                    };
                    
                    this.newMessage = actions[type];
                    this.sendMessage();
                },

                toggleVoiceInput() {
                    this.isListening = !this.isListening;
                    // Placeholder for voice functionality
                    if (this.isListening) {
                        setTimeout(() => {
                            this.isListening = false;
                        }, 3000);
                    }
                },

                autoResize(event) {
                    event.target.style.height = 'auto';
                    event.target.style.height = event.target.scrollHeight + 'px';
                },

                scrollToBottom() {
                    this.$nextTick(() => {
                        this.$refs.chatContainer.scrollTop = this.$refs.chatContainer.scrollHeight;
                    });
                }
            }
        }
    </script>
</body>
</html> 