const sidebar = document.getElementById('sidebar');
const toggleBtn = document.getElementById('toggleSidebar');
const openSidebarBtn = document.getElementById('openSidebar');
const textarea = document.getElementById('dynamicInput');
const Greetings = document.getElementById('greeting');
const chats = document.getElementById('chats');
const ChatBox = document.getElementById('chatBox');

toggleBtn?.addEventListener('click', () => {
    sidebar.classList.add('-translate-x-full');
});

openSidebarBtn?.addEventListener('click', () => {
    sidebar.classList.remove('-translate-x-full');
});

textarea?.addEventListener('input', () => {
    textarea.style.height = 'auto';
    textarea.style.height = `${Math.min(textarea.scrollHeight, 500)}px`;
});

// Add Enter key event listener
textarea?.addEventListener('keydown', (event) => {
    if (event.key === 'Enter' && !event.shiftKey && textarea.value.trim()) {
        event.preventDefault();
        askGemini();
    }
});
