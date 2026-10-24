
@csrf

<label>Project Title *</label>
<input type="text" name="title"
       value="{{ old('title', $project->title ?? '') }}" required>

<label>Subtitle</label>
<input type="text" name="subtitle"
       value="{{ old('subtitle', $project->subtitle ?? '') }}">

<label>Description *</label>
<textarea name="description" rows="5" required>{{ old('description', $project->description ?? '') }}</textarea>

<label>Technologies (comma separated)</label>
<input type="text" name="technologies"
       value="{{ old('technologies', $project->technologies ?? '') }}"
       placeholder="Laravel, PHP, MySQL">

<label>Project Image</label>
<input type="file" name="image" accept=".jpg,.jpeg,.png,.webp">

@if(!empty($project?->image))
    <p>Current image:</p>
    <img src="{{ asset('storage/' . $project->image) }}"
         alt="Current project image"
         style="max-width:180px;border-radius:10px">
@endif

<label>Project Website URL</label>
<input type="url" name="project_url"
       value="{{ old('project_url', $project->project_url ?? '') }}"
       placeholder="https://example.com">

<label>GitHub URL</label>
<input type="url" name="github_url"
       value="{{ old('github_url', $project->github_url ?? '') }}"
       placeholder="https://github.com/username/project">

<label class="check">
    <input type="checkbox" name="is_visible" value="1"
        @checked(old('is_visible', isset($project) ? $project->is_visible : true))>
    Show this project on Portfolio Home
</label>

<button type="submit">{{ $buttonText }}</button>
<a href="{{ route('admin.projects.index') }}" class="cancel">Cancel</a>
