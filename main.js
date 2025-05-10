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

const Chats = [];

function renderChats() {
    chats.innerHTML = ''; // Clear existing content

    if (Chats.length > 0) {
        Greetings?.classList.add('hidden');
        ChatBox?.classList.remove('hidden');
    }

    Chats.forEach(chat => {
        const li = document.createElement('li');
        li.className = 'bg-[#1f2937] p-2 tracking-wider leading-10 rounded-md py-4 px-8';
        li.textContent = chat;
        chats.appendChild(li);
    });
}

async function askGemini() {
    const prompt = textarea.value || '';
    if (!prompt.trim()) return;

    Chats.push(`You: ${prompt}`);
    textarea.value = "";
    renderChats();

    try {
        const res = await fetch('/api/chat.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ prompt }),
        });

        
    } catch (err) {
        console.error(err);
        textarea.value = 'Something went wrong. Please try again.';
    }
}