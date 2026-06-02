<x-tasks.form 
    title="Создание задачи" 
    :action="route('tasks.store')" 
    :projects="$projects" 
    :model="null" 
/>