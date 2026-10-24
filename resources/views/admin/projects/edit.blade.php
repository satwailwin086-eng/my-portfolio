
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Project</title>
    <style>
        * { box-sizing: border-box; }
        body { margin: 0; padding: 30px 15px; background: #0b1024; color: white; font-family: Arial, sans-serif; }
        .box { max-width: 700px; margin: auto; padding: 28px; background: #171d38; border: 1px solid #303858; border-radius: 16px; }
        h1 { margin-top: 0; }
        label { display: block; margin: 18px 0 8px; color: #ddd6fe; }
        input:not([type=checkbox]):not([type=file]), textarea { width: 100%; padding: 12px; border-radius: 8px; border: 1px solid #454c70; background: #0b1024; color: white; }
        input[type=file] { max-width: 100%; }
        .check { display: flex; align-items: center; gap: 10px; }
        button, .cancel { display: inline-block; margin-top: 20px; padding: 12px 16px; border: 0; border-radius: 8px; background: #7c3aed; color: white; text-decoration: none; cursor: pointer; }
        .cancel { background: #303858; margin-left: 8px; }
        .errors { color: #fda4af; }
    </style>
</head>
<body>
<div class="box">
    <h1>Edit Project</h1>
    <p>Update the project details below.</p>

    @if($errors->any())
        <div class="errors">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST"
          action="{{ route('admin.projects.update', $project) }}"
          enctype="multipart/form-data">
        @method('PUT')
        @include('admin.projects._form', [
            'buttonText' => 'Save Changes',
            'project' => $project
        ])
    </form>
</div>
</body>
</html>
