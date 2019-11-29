const projects = document.getElementById('projects');

if (projects) {
    projects.addEventListener('click', e => {
        if (e.target.className === 'btn btn-danger delete-project') {
            if (confirm('Are you sure?')) {

            }else{

            }
        }
    });
}