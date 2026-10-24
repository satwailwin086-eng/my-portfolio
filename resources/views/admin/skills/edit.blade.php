<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Skill | Portfolio Admin</title>

    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            min-height: 100vh;
            padding: 35px 15px;
            background: #0b1024;
            color: #f8fafc;
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 650px;
            margin: 0 auto;
            padding: 30px;
            background: #111827;
            border: 1px solid #303858;
            border-radius: 18px;
        }

        h1 { margin-top: 0; }
        .muted { color: #a5b4fc; line-height: 1.6; }

        label {
            display: block;
            margin: 20px 0 8px;
            font-weight: bold;
        }

        input, textarea {
            width: 100%;
            padding: 13px;
            color: white;
            background: #171d38;
            border: 1px solid #454c70;
            border-radius: 10px;
            font: inherit;
        }

        input:focus, textarea:focus { outline: 1px solid #a78bfa; }
        textarea { resize: vertical; }

        .error { color: #fda4af; font-size: 14px; margin-top: 7px; }

        .btn, button {
            display: inline-block;
            padding: 12px 16px;
            border: 0;
            border-radius: 9px;
            background: #7c3aed;
            color: white;
            text-decoration: none;
            font-size: 14px;
            cursor: pointer;
        }

        .btn-secondary { background: #202746; border: 1px solid #454c70; }
        .actions { display: flex; flex-wrap: wrap; gap: 10px; margin-top: 25px; }
    </style>
</head>

<body>
<div class="container">
    <h1>✎ Edit Skill</h1>
    <p class="muted">Update the details for {{ $skill->name }}.</p>

    <form method="POST" action="{{ route('admin.skills.update', $skill) }}">
        @csrf
        @method('PUT')

        <label for="name">Skill Name *</label>
        <input
            id="name"
            type="text"
            name="name"
            value="{{ old('name', $skill->name) }}"
            maxlength="255"
            required
        >
        @error('name')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="category">Category (Optional)</label>
        <input
            id="category"
            type="text"
            name="category"
            value="{{ old('category', $skill->category) }}"
            maxlength="255"
            placeholder="e.g. Frontend, Backend"
        >
        @error('category')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="description">Description (Optional)</label>
        <textarea
            id="description"
            name="description"
            rows="4"
            placeholder="Describe this skill..."
        >{{ old('description', $skill->description) }}</textarea>
        @error('description')
            <div class="error">{{ $message }}</div>
        @enderror

        <div class="actions">
            <button type="submit">Update Skill</button>
            <a href="{{ route('admin.skills.index') }}"
               class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
</body>
</html>