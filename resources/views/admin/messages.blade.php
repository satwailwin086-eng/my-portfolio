
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Messages | Portfolio</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            background: #0b1024;
            color: #f8fafc;
            font-family: Arial, sans-serif;
        }

        .sidebar {
            width: 245px;
            position: fixed;
            inset: 0 auto 0 0;
            padding: 30px 18px;
            background: #111827;
            border-right: 1px solid #272747;
        }

        .brand {
            font-size: 21px;
            font-weight: bold;
            margin: 4px 0 8px;
        }

        .subtitle {
            color: #a5b4fc;
            font-size: 13px;
        }

        .nav {
            display: grid;
            gap: 12px;
            margin-top: 45px;
        }

        .nav a {
            padding: 14px;
            color: #cbd5e1;
            text-decoration: none;
            border-radius: 10px;
        }

        .nav a.active,
        .nav a:hover {
            color: white;
            background: #3730a3;
        }

        .main {
            margin-left: 245px;
            padding: 32px;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 18px;
            flex-wrap: wrap;
            margin-bottom: 28px;
        }

        h1 {
            margin: 0 0 8px;
            font-size: 30px;
        }

        .muted {
            color: #a5b4fc;
        }

        .actions,
        .search,
        .card-actions,
        .view-links {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 10px;
        }

        input {
            width: 320px;
            max-width: 100%;
            padding: 12px 14px;
            color: white;
            background: #171d38;
            border: 1px solid #454c70;
            border-radius: 10px;
            outline: none;
        }

        input:focus {
            border-color: #a78bfa;
        }

        button,
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 11px 15px;
            border: 0;
            border-radius: 9px;
            background: #7c3aed;
            color: white;
            text-decoration: none;
            font-size: 14px;
            cursor: pointer;
            transition: 0.2s;
        }

        button:hover,
        .btn:hover {
            background: #6d28d9;
        }

        .btn-secondary {
            background: #202746;
            border: 1px solid #454c70;
        }

        .btn-secondary:hover {
            background: #30385c;
        }

        .btn-saved {
            background: #4338ca;
        }

        .danger {
            background: #7f1d3d;
            color: #fecdd3;
        }

        .danger:hover {
            background: #be123c;
            color: white;
        }

        .notice {
            padding: 13px 16px;
            margin: 16px 0;
            background: #12382f;
            color: #a7f3d0;
            border: 1px solid #166534;
            border-radius: 10px;
        }

        .summary {
            margin: 25px 0 16px;
            color: #c4b5fd;
        }

        .view-links {
            margin-top: 22px;
        }

        .view-links a.active {
            background: #7c3aed;
            border-color: #7c3aed;
        }

        .message-card {
            display: grid;
            grid-template-columns: minmax(180px, 0.85fr)
                                   minmax(220px, 1.5fr)
                                   auto;
            align-items: center;
            gap: 22px;
            padding: 23px;
            margin-bottom: 16px;
            background: linear-gradient(120deg, #171d38, #151a32);
            border: 1px solid #303858;
            border-radius: 16px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
            transition: border-color 0.2s, transform 0.2s;
        }

        .message-card:hover {
            border-color: #7c3aed;
            transform: translateY(-2px);
        }

        .sender {
            min-width: 0;
        }

        .avatar {
            display: inline-flex;
            width: 42px;
            height: 42px;
            align-items: center;
            justify-content: center;
            margin-right: 10px;
            border-radius: 50%;
            background: linear-gradient(135deg, #6366f1, #a78bfa);
            color: white;
            font-size: 18px;
            font-weight: bold;
            vertical-align: middle;
        }

        .sender h3 {
            display: inline;
            font-size: 16px;
            overflow-wrap: anywhere;
        }

        .email {
            margin: 12px 0 7px;
            color: #c4b5fd;
            font-size: 13px;
            overflow-wrap: anywhere;
        }

        .date {
            color: #94a3b8;
            font-size: 12px;
        }

        .message-text {
            color: #e2e8f0;
            line-height: 1.7;
            overflow-wrap: anywhere;
            white-space: pre-wrap;
        }

        .card-actions {
            justify-content: flex-end;
        }

        .card-actions form {
            margin: 0;
        }

        .empty {
            padding: 50px 20px;
            text-align: center;
            color: #cbd5e1;
            background: #171d38;
            border: 1px dashed #454c70;
            border-radius: 16px;
        }

        .pagination {
            margin-top: 24px;
            overflow-wrap: anywhere;
        }

        .pagination nav {
            display: flex;
            justify-content: space-between;
            gap: 12px;
        }

        .pagination a,
        .pagination span {
            color: #c4b5fd;
        }

        @media (max-width: 1050px) {
            .message-card {
                grid-template-columns: 1fr;
                gap: 14px;
            }

            .card-actions {
                justify-content: flex-start;
            }
        }

        @media (max-width: 700px) {
            .sidebar {
                position: static;
                width: 100%;
                padding: 18px;
            }

            .nav {
                display: flex;
                flex-wrap: wrap;
                margin-top: 20px;
            }

            .main {
                margin-left: 0;
                padding: 20px 14px;
            }

            h1 {
                font-size: 25px;
            }

            .search {
                width: 100%;
            }

            .search input {
                flex: 1;
                width: 100%;
            }
        }

        /* Delete confirmation modal */
.delete-modal {
    display: none;
    position: fixed;
    inset: 0;
    z-index: 9999;
    background: rgba(3, 6, 20, 0.8);
    backdrop-filter: blur(6px);
    align-items: center;
    justify-content: center;
    padding: 20px;
}

.delete-modal.show {
    display: flex;
}

.delete-modal-box {
    width: 100%;
    max-width: 400px;
    padding: 30px;
    background: linear-gradient(145deg, #171d38, #0b1024);
    border: 1px solid #454c70;
    border-radius: 20px;
    text-align: center;
    box-shadow: 0 20px 60px #0008;
    color: #f8fafc;
}

.delete-icon {
    width: 58px;
    height: 58px;
    margin: 0 auto 18px;
    display: grid;
    place-items: center;
    border-radius: 50%;
    background: #7f1d3d;
    color: white;
    font-size: 28px;
}

.delete-modal-box h2 {
    margin-bottom: 10px;
}

.delete-modal-box p {
    color: #cbd5e1;
    line-height: 1.6;
    overflow-wrap: anywhere;
}

.delete-modal-actions {
    display: flex;
    justify-content: center;
    gap: 12px;
    margin-top: 24px;
}

.delete-modal-actions button {
    padding: 12px 18px;
    border-radius: 9px;
}

.cancel-delete {
    background: #202746;
    border: 1px solid #454c70;
}

.confirm-delete {
    background: #dc2626;
}

.confirm-delete:hover {
    background: #b91c1c;
}



    </style>
</head>

<body>
    <aside class="sidebar">
        <div class="brand">✦ Portfolio Admin</div>
        

        <nav class="nav">
            

            <a href="{{ route('admin.messages') }}"
               class="{{ request('view') !== 'saved' ? 'active' : '' }}">
                ✉ All Messages
            </a>

            <a href="{{ route('admin.messages', ['view' => 'saved']) }}"
               class="{{ request('view') === 'saved' ? 'active' : '' }}">
                ★ Saved Messages
            </a>
            <a href="{{ route('admin.projects.index') }}">
                  📁 Manage Projects
            </a>
            <a href="{{ route('admin.skills.index') }}">
    🛠 Manage Skills
          </a>

            <a href="{{ route('admin.logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                ↪ Logout
            </a>
        </nav>

        <form id="logout-form"
              method="POST"
              action="{{ route('admin.logout') }}"
              hidden>
            @csrf
        </form>
    </aside>

    <main class="main">
        <header class="topbar">
            <div>
                <h1>
                    {{ request('view') === 'saved' ? 'Saved Messages' : 'Messages' }}
                </h1>

                <div class="muted">
                    View and manage your portfolio contact messages
                </div>
            </div>

        </header>

        @if (session('success'))
            <div class="notice">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="notice">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form class="search"
              method="GET"
              action="{{ route('admin.messages') }}">

            @if (request('view') === 'saved')
                <input type="hidden" name="view" value="saved">
            @endif

            <input
                type="search"
                name="search"
                value="{{ request('search') }}"
                placeholder="Search name, email or message..."
                aria-label="Search messages"
            >

            <button type="submit">⌕ Search</button>

            <a href="{{ route('admin.messages', request('view') === 'saved' ? ['view' => 'saved'] : []) }}"
               class="btn btn-secondary">
                Clear
            </a>
        </form>

        <p class="summary">
            {{ $messages->total() }} messages found
        </p>

        @forelse ($messages as $message)
            <article class="message-card">
                <div class="sender">
                    <div>
                        <span class="avatar">
                            {{ strtoupper(substr($message->name, 0, 1)) }}
                        </span>

                        <h3>{{ $message->name }}</h3>
                    </div>

                    <div class="email">
                        ✉ {{ $message->email }}
                    </div>

                    <div class="date">
                        {{ $message->created_at?->format('d M Y, h:i A') }}
                    </div>
                </div>

                <div class="message-text">{{ $message->message }}</div>

                
<div class="card-actions">
    <form method="POST"
          action="{{ route('admin.messages.reply', $message) }}"
          style="display:flex; flex-wrap:wrap; gap:8px; width:100%; margin-bottom:10px;">
        @csrf

        <textarea
            name="reply"
            rows="3"
            required
            maxlength="10000"
            placeholder="Write your reply to {{ $message->name }}..."
            aria-label="Reply to {{ $message->name }}"
            style="width:100%; padding:12px; color:white; background:#171d38; border:1px solid #454c70; border-radius:10px; resize:vertical;"
        ></textarea>

        <button type="submit"
                onclick="return confirm('Send this reply by email?')">
            ✉ Send Reply
        </button>
    </form>

    <form method="POST"
          action="{{ route('admin.messages.save', $message) }}">
        @csrf

        <button type="submit">
            {{ $message->is_saved ? '★ Unsave' : '☆ Save' }}
        </button>
    </form>

   <form method="POST"
      action="{{ route('admin.messages.delete', $message) }}"
      class="delete-form">
    @csrf
    @method('DELETE')

    <button type="button"
            class="danger"
            onclick="openDeleteModal(this)"
            data-message="{{ $message->name }}">
        🗑 Delete
    </button>
</form>
</div>

            </article>
        @empty
            <div class="empty">
                <h3>No messages found</h3>
                <p>Try another search or check again later.</p>
            </div>
        @endforelse

        <div class="pagination">
            {{ $messages->withQueryString()->links() }}

        </div>

        <a href="{{ url('/') }}" class="btn btn-secondary">
                ← Back to Portfolio
            </a>
    </main>
        

    <!-- Delete Confirmation Modal -->
    <div id="deleteModal" class="delete-modal">
        <div class="delete-modal-box">
            <div class="delete-icon">!</div>

            <h2>Delete Message?</h2>

            <p id="deleteMessage">
                Are you sure you want to delete this message?
            </p>

            <div class="delete-modal-actions">
                <button type="button"
                        class="cancel-delete"
                        onclick="closeDeleteModal()">
                    Cancel
                </button>

                <button type="button"
                        class="confirm-delete"
                        onclick="confirmDelete()">
                    Yes, Delete
                </button>
            </div>
        </div>
    </div>

    <script>
        let selectedDeleteForm = null;

        function openDeleteModal(button) {
            selectedDeleteForm = button.closest('form');

            const senderName = button.dataset.message;

            document.getElementById('deleteMessage').textContent =
                `Are you sure you want to delete the message from "${senderName}"?`;

            document.getElementById('deleteModal').classList.add('show');
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.remove('show');
            selectedDeleteForm = null;
        }

        function confirmDelete() {
            if (selectedDeleteForm) {
                selectedDeleteForm.submit();
            }
        }

        document.getElementById('deleteModal').addEventListener('click', function (event) {
            if (event.target === this) {
                closeDeleteModal();
            }
        });

        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape') {
                closeDeleteModal();
            }
        });
    </script>
</body>
</html>
</body>
</html>
