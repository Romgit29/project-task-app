<x-tasks.form 
    title="Редактирование задачи" 
    method="PUT"
    :action="route('tasks.update', $task)" 
    :projects="$projects" 
    :model="$task" 
/>