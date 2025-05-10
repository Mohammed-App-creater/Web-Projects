# AstuChatMeat Project

## Overview

**AstuChatMeat** is a web-based chatbot application tailored to simulate personalized interactions between users and an AI system. The project incorporates a user registration system, a chat interface with memory capabilities, and an intuitive UI/UX powered by Tailwind CSS. Additionally, brainstorming components are included to foster creativity for end-users through modular ideas and styles.

---

## Features

### 1. User Authentication
- Registration and Login functionality.
- Password hashing for security using `password_hash()`.

### 2. Chat Functionality
- User-friendly chat interface to facilitate intuitive conversations.
- Backend API integration for handling conversations with Gemini API.
- Chat memory to maintain conversational session data.
- Auto-resizing and responsive input for messages.

### 3. Brainstorming Component
- Visual rendering of brainstorming ideas.
- Configurable styling with dynamic icons and colors.

### 4. Organized Component-Based Structure
- Modular, scalable PHP and JS components ready for future extensions.

---

## Installation

### 1. Prerequisites
Make sure the following requirements are met before proceeding:
- PHP ≥ 7.0
- MySQL database
- Composer dependency manager installed

### 2. Setup Steps
1. Clone the repository:
   ```bash
   git clone https://github.com/your-repo/AstuChatMeat.git
   cd AstuChatMeat
   ```
2. Create a `.env` file to store database credentials:
   ```plaintext
   DB_HOST=your-db-host
   DB_NAME=your-db-name
   DB_USER=your-db-user
   DB_PASS=your-db-password
   ```
3. Import the database schema:
    - Use `database.sql` (if provided) or create the following tables manually:
        - **users**
        - **chats**
        - **chat_history**
        - **memory**

4. Install dependencies with Composer:
   ```bash
   composer install
   ```

5. Start a local development server:
   ```bash
   php -S localhost:8000
   ```
6. Access the application at [http://localhost:8000](http://localhost:8000).

---

## Screenshots

## SignInPage
![SignInPage Screenshot](https://github.com/Mohammed-App-creater/Web-Projects/blob/master/assets/signIn.png)

## SignUpPage
![SignUpPage Screenshot](http://github.com/Mohammed-App-creater/Web-Projects/blob/master/assets/signUp.png)

### Homepage
![Homepage Screenshot](https://github.com/Mohammed-App-creater/Web-Projects/blob/Mohammed/assets/home.png)

### Chat Interface
![Chat Interface Screenshot](assets/screenshot-chat.png)

### Brainstorming Display
![Brainstorming Display Screenshot](assets/screenshot-brainstorming.png)

*(You can replace the `src` of the above images with the actual online links when available.)*

---

## Usage

1. **Registration**:
    - Navigate to the `/signup` route to create a new user account.

2. **Login**:
    - Navigate to the `/signin` route to log in.

3. **Chat**:
    - Once logged in, navigate to `/chat`.
    - Enter text prompts in the chat box and interact with the chatbot.

4. **Brainstorming Component**:
    - Visit `/home` to see brainstorming ideas rendered with visuals and dynamic components.

---

## File Structure

```plaintext
AstuChatMeat/
├── api/
│   ├── chat.php           # Backend endpoint for chatbot responses
│   ├── gemini-caller.php  # Integration with Gemini API
├── assets/                # Contains screenshots, icons, and static assets
├── Controller/
│   ├── home.php           # Controller for the homepage
│   ├── signup.php         # Controller for user registration
│   └── signin.php         # Controller for user login
├── View/
│   ├── 404.view.php       # View for 404 errors
│   └── brainstorming.view.php  # Brainstorming idea rendering view
├── config/
│   └── database.php       # Configuration file for database connection
├── core/
│   ├── User.php           # Class for user authentication and registration
│   ├── Database.php       # Database abstraction class
├── public/
│   ├── main.css           # Tailwind CSS for styling
│   ├── main.js            # JavaScript for frontend logic
├── route.php              # Application routing logic
└── index.php              # Entry point of the web application
```

---

## Technical Highlights

### Backend
- Built with PHP, following modular design principles
- Uses PDO for secure database interaction
- Stateless and session-driven architecture

### Frontend
- Styled using [Tailwind CSS](https://tailwindcss.com)
- Responsive and dynamic UI for chat functionality and brainstorming
- Auto-resizable text input for better usability

### API Integration
- Communicates with Gemini API to process user queries
- Asynchronous operations with `fetch` in `main.js`

### Database
- Designed with normalized tables for:
    - User account management
    - Tracking chat sessions and history
    - Maintaining user-specific memory

---

## Contributing

We welcome contributions to improve the project. If you identify any issues or areas for enhancement, feel free to submit a pull request or open an issue.

### Steps to Contribute
1. Fork the repository.
2. Make the necessary changes.
3. Submit a pull request with a detailed explanation.

---

## License

AstuChatMeat is licensed under [MIT License](https://opensource.org/licenses/MIT).

Feel free to use, modify, and distribute the code in this project.

---

## Contact

For inquiries or further information about the project:
- Email: [support@astuchatmeat.com](mailto:support@astuchatmeat.com)
- Website: [https://astuchatmeat.com](https://astuchatmeat.com)

---

