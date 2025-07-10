# 🎯 Cursor Development Rules for RevSales CRM (Frontend + Backend)

## 📱 UI/UX Design Principles (Mobile-First + Desktop Friendly)

- Mobile is **priority**, but layout must gracefully **scale up to desktop** (responsive).
- Use **clean, minimal, professional UI** — no neon gradients, no cringe icons.
- Use **TailwindCSS** with consistent spacing (`p-2`, `p-4`), rounded corners (`rounded-2xl`), and soft shadows (`shadow-md`).
- Avoid overcrowding. Use **grid layouts** or **stacked cards** for separation.
- Use font sizes like `text-xl`, `text-base`, `text-sm` properly based on element hierarchy.
- Design should resemble **modern apps like WhatsApp, Notion, Linear, Intercom.**
- Prefer **dark mode + light mode toggle**.
- Avoid dropdowns where natural text can work (chat-based input).

## 🧠 UI/UX Functional Guidelines

- **Input-first interface**: User can enter text/voice — system understands context.
- Always **acknowledge user input** with a visual confirmation (e.g., chat bubble, badge).
- Add **gamification visual feedback** (progress bar, daily streak badge).
- All UI components must be:
  - Accessible (basic ARIA support)
  - Keyboard friendly
  - Fast-loading (JS split if needed)

## ⚙️ Tech Stack & Architecture

### Frontend
- Use **Next.js** or **Laravel Blade** + AlpineJS if SSR.
- Mobile PWA support preferred.
- Use **TailwindCSS** for styling.
- Use **Chart.js / Recharts** for dashboards and reports.
- Handle audio input using **Web APIs** (MediaRecorder) — use `<audio>` previews in UI.

### Backend (Laravel)
- Use **Laravel 11** with Sanctum auth
- Route guards by role: solo user, team member, manager
- Use **MySQL** for permanent storage, **Redis** for:
  - Caching
  - Session data
  - LLM conversation context
- Scheduled Jobs via Laravel's `scheduler` or `n8n` for:
  - Follow-ups
  - Auto-email / WhatsApp messages

### AI / LLM
- Use **Together.ai API** via **LangChain** for:
  - Text-to-structured data conversion
  - Follow-up generation
  - Summarization
- Keep LLM requests **under 300 tokens**, design prompts for reliability

### Messaging & Notifications
- Use **Firebase Cloud Messaging (FCM)** for push notifications
- WhatsApp integration:
  - Solo user: via **Baileys** (at their risk)
  - Teams: via **Twilio**, paid + integrated via manager account

## 📦 DB Schema Principles
- Store all leads in a single table
- Use polymorphic relationships for notes, activities, reminders
- Support `free_trial`, `freemium`, `paid` subscriptions per user/company
- Track LLM request counts per user daily

---

📝 **Development Commandments**
- ✅ Build with scaling in mind: 10 → 100 → 10,000 users
- 🧪 Every feature must be testable (unit or browser-level)
- 🛡️ Secure routes, rate limit LLM endpoints
- 🔄 All async logic (audio, AI, task reminders) should have **fallbacks**
- 📊 Integrate **PostHog** or **Plausible** for heatmaps, analytics, drop-offs

---

📌 Example Prompt for Cursor:
> “Design a lead capture component. Mobile-first. Use Tailwind. Capture name, phone, date, and follow-up note. Clean UI like Notion. On desktop, it should expand into a 2-column layout.”

---

Let me know if you'd like this saved in a `.md` or `.js` file format. I can generate the exact structure to copy-paste into Cursor or VSCode projects.
