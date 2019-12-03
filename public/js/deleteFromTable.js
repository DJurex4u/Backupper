const projects = document.getElementById('projects');

if (projects) {
    projects.addEventListener('click', e => {
        if (e.target.className === 'btn btn-danger delete-project') {
            if (confirm('Are you sure?')) {
                const id = e.target.getAttribute('data-id');

                alert(`Project with id= ${id} is deleted.`);

                fetch(`/project/delete/${id}`, {
                    method: 'DELETE'
                }).then(res => window.location.reload());
            }
        }
    });
}

/*
* if (confirm('Are you sure?')) {
                const id = e.target.getAttribute('data-id');
                alert(id);
                alert('šupi pišu');

                fetch(`/project/delete/${id}`, {
                    method: 'DELETE'
                }).then(res => window.location.replace('/project/list'));
            }
* */
