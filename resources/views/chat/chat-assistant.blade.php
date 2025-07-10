<div>
    <div class="h-screen flex flex-col max-w-4xl mx-auto bg-white shadow-2xl lg:my-4 lg:rounded-2xl lg:overflow-hidden">
        
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
                        <p class="text-xs text-slate-500 font-medium">{{ $this->currentDate }}</p>
                    </div>
                </div>
                
                <!-- Points Gamification -->
                <div class="bg-gradient-to-r from-slate-50 to-blue-50 rounded-xl px-3 py-2 shadow-sm border border-slate-200 hover:shadow-md transition-all duration-200">
                    <div class="flex items-center space-x-2">
                        <div class="w-6 h-6 bg-gradient-to-br from-blue-500 to-purple-600 rounded-lg flex items-center justify-center">
                            <span class="text-xs text-white font-semibold">🎯</span>
                        </div>
                        <div class="flex items-baseline space-x-1">
                            <span class="text-lg font-bold text-slate-800">{{ $pointsToday }}</span>
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
                    Conversation started today at {{ $this->startTime }} IST
                </span>
            </div>
        </div>

        <!-- Chat Messages Area -->
        <div class="flex-1 overflow-y-auto chat-scroll p-4 space-y-6" id="chatContainer">
            
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
                        <span class="text-xs text-slate-400">{{ $this->startTime }}</span>
                    </div>
                </div>
            </div>

            <!-- Dynamic Messages -->
            @foreach($messages as $index => $message)
                <div class="flex {{ $message['type'] === 'user' ? 'justify-end' : 'items-start space-x-3' }} message-enter">
                    <!-- AI Avatar (only for AI messages) -->
                    @if($message['type'] === 'ai')
                        <div class="flex-shrink-0">
                            <div class="w-8 h-8 bg-gradient-to-br from-brand-green to-emerald-600 rounded-lg flex items-center justify-center">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                </svg>
                            </div>
                        </div>
                    @endif
                    
                    <div class="max-w-md">
                        <div class="{{ $message['type'] === 'user' 
                            ? 'bg-gradient-to-r from-brand-blue to-blue-600 text-white rounded-2xl rounded-tr-md' 
                            : 'bg-white border border-slate-200 rounded-2xl rounded-tl-md' }} p-4 shadow-sm">
                            <p class="text-sm leading-relaxed {{ $message['type'] === 'user' ? 'text-white' : 'text-slate-800' }}">
                                {{ $message['content'] }}
                            </p>
                            
                            <!-- Actions for AI messages -->
                            @if($message['type'] === 'ai' && isset($message['actions']))
                                <div class="mt-3 space-y-2">
                                    @foreach($message['actions'] as $action)
                                        <div class="flex items-center space-x-2 p-2 bg-blue-50 rounded-lg">
                                            <span>{{ $action['icon'] }}</span>
                                            <span class="text-sm text-slate-700">{{ $action['text'] }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                        <div class="mt-1 {{ $message['type'] === 'user' ? 'mr-2 text-right' : 'ml-2' }}">
                            <span class="text-xs text-slate-400">{{ $message['timestamp'] }}</span>
                        </div>
                    </div>
                </div>
            @endforeach

            <!-- Typing Indicator -->
            @if($isTyping)
                <div class="flex items-start space-x-3 message-enter">
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
            @endif
        </div>

        <!-- Message Input -->
        <div class="bg-white border-t border-slate-200 p-4">
            <div class="flex items-end">
                <!-- Text Input Area -->
                <div class="flex-1 relative">
                    <textarea 
                        wire:model="newMessage"
                        wire:keydown.enter.prevent="sendMessage()"
                        placeholder="Ask me to follow up with a lead, create tasks, or anything sales related..."
                        class="w-full p-4 pr-24 bg-slate-50 border border-slate-200 rounded-xl resize-none focus:outline-none focus:ring-2 focus:ring-brand-blue focus:border-transparent placeholder-slate-400 text-sm leading-relaxed max-h-32"
                        rows="1"
                    ></textarea>
                    
                    <!-- Voice Input Button -->
                    <button wire:click="toggleVoiceInput()" 
                            class="absolute right-12 bottom-2 p-2.5 rounded-lg transition-all duration-200 group {{ $isListening ? 'bg-red-100 hover:bg-red-200' : 'bg-slate-100 hover:bg-slate-200' }}">
                        <svg class="w-4 h-4 transition-colors {{ $isListening ? 'text-red-600' : 'text-slate-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z" />
                        </svg>
                    </button>
                    
                    <!-- Send Button -->
                    <button 
                        wire:click="sendMessage()"
                        class="absolute right-2 bottom-2 p-2.5 rounded-lg transition-all duration-200 {{ trim($newMessage) ? 'bg-brand-blue hover:bg-blue-700 text-white' : 'bg-slate-200 text-slate-400 cursor-not-allowed' }}"
                    >
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

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

    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('scrollToBottom', () => {
                const chatContainer = document.getElementById('chatContainer');
                if (chatContainer) {
                    chatContainer.scrollTop = chatContainer.scrollHeight;
                }
            });

            Livewire.on('addAIResponse', (data) => {
                // This will be handled by the Livewire component
            });
        });

        // Auto-resize textarea
        document.addEventListener('input', function(e) {
            if (e.target.tagName === 'TEXTAREA') {
                e.target.style.height = 'auto';
                e.target.style.height = e.target.scrollHeight + 'px';
            }
        });
    </script>
</div> 