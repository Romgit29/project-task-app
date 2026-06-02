<x-form.wrap :action="route('projects.store')" title="Создать проект">
    <x-form.field name="name" label="Название">
        <input type="text" name="name" id="name" required class="form-field">
    </x-form.field>

    <button type="submit" class="btn btn-primary">
        Создать
    </button>
</x-form.wrap>