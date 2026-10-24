<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manage Skills | Portfolio Admin</title>

    <style>
        * { box-sizing: border-box; }

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

        .brand { font-size: 21px; font-weight: bold; }
        .subtitle { color: #a5b4fc; font-size: 13px; margin-top: 8px; }

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

        .nav a:hover, .nav a.active {
            color: white;
            background: #3730a3;
        }

        .main { margin-left: 245px; padding: 32px; }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
            margin-bottom: 25px;
        }

        h1 { margin: 0 0 8px; font-size: 30px; }
        .muted { color: #a5b4fc; }

        .btn, button {
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
        }

        .btn:hover, button:hover { background: #6d28d9; }

        .secondary {
            background: #202746;
            border: 1px solid #454c70;
        }

        .danger { background: #7f1d3d; }
        .danger:hover { background: #be123c; }

        .notice {
            padding: 13px 16px;
            margin: 16px 0;
            background: #12382f;
            color: #a7f3d0;
            border: 1px solid #166534;
            border-radius: 10px;
        }

        .error { color: #fda4af; margin: 12px 0; }

        .skill-card {
            padding: 22px;
            margin-bottom: 15px;
            background: linear-gradient(120deg, #171d38, #151a32);
            border: 1px solid #303858;
            border-radius: 15px;
        }

        .skill-card h2 { margin: 0 0 10px; font-size: 21px; }
        .category { color: #c4b5fd; font-size: 13px; }
        .description { color: #cbd5e1; line-height: 1.7; }
        .actions { display: flex; flex-wrap: wrap; gap: 10px; margin-top: 18px; }
        .actions form { margin: 0; }

        .empty {
            padding: 40px 20px;
            text-align: center;
            background: #171d38;
            border: 1px dashed #454c70;
            border-radius: 15px;
        }

        @media (max-width: 700px) {
            .sidebar { position: static; width: 100%; padding: 18px; }
            .nav { display: flex; flex-wrap: wrap; margin-top: 20px; }
            .main { margin-left: 0; padding: 20px 14px; }
            h1 { font-size: 25px; }
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
    <div class="subtitle">Manage your portfolio</div>

    <nav class="nav">
        <a href="{{ route('admin.messages') }}">✉ All Messages</a>
        <a href="{{ route('admin.messages', ['view' => 'saved']) }}">★ Saved Messages</a>
        <a href="{{ route('admin.projects.index') }}">📁 Manage Projects</a>
        <a href="{{ route('admin.skills.index') }}" class="active">🛠 Manage Skills</a>

        <a href="{{ route('admin.logout') }}"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            ↪ Logout
        </a>
    </nav>

    <form id="logout-form" method="POST"
          action="{{ route('admin.logout') }}" hidden>
        @csrf
    </form>
</aside>

<main class="main">
    <header class="topbar">
        <div>
            <h1>Manage Skills</h1>
            <div class="muted">Add and manage your portfolio skills.</div>
        </div>

        <a href="{{ route('admin.skills.create') }}" class="btn">
            + Add New Skill
        </a>
    </header>

    @if (session('success'))
        <div class="notice">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div class="notice error">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <p class="muted">{{ $skills->count() }} skills added</p>

    @forelse ($skills as $skill)
        <article class="skill-card">
            <h2>{{ $skill->name }}</h2>

            @if ($skill->category)
                <div class="category">
                    Category: {{ $skill->category }}
                </div>
            @endif

            @if ($skill->description)
                <p class="description">{{ $skill->description }}</p>
            @else
                <p class="description">No description added.</p>
            @endif

            <div class="actions">
                <a href="{{ route('admin.skills.edit', $skill) }}"
                   class="btn">✎ Edit</a>

                <form method="POST"
      action="{{ route('admin.skills.destroy', $skill) }}"
      class="delete-form">
    @csrf
    @method('DELETE')

    <button type="button"
            class="danger"
            onclick="openDeleteModal(this)"
            data-skill="{{ $skill->name }}">
        🗑 Delete
    </button>
</form>
            </div>
        </article>
    @empty
        <div class="empty">
            <h2>No skills added yet</h2>
            <p class="muted">Click “Add New Skill” to get started.</p>
            <a href="{{ route('admin.skills.create') }}" class="btn">
                + Add Your First Skill
            </a>
        </div>
    @endforelse

    <p style="margin-top: 25px;">
        <a href="{{ url('/') }}" class="btn secondary">← Back to Portfolio</a>
    </p>
</main>


<div id="deleteModal" class="delete-modal">
    <div class="delete-modal-box">
        <div class="delete-icon">!</div>

        <h2>Delete Skill?</h2>

        <p id="deleteMessage">
            Are you sure you want to delete this skill?
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

        const skillName = button.dataset.skill;

        document.getElementById('deleteMessage').textContent =
            `Are you sure you want to delete "${skillName}"?`;

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