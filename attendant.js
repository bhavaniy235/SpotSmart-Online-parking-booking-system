 document.addEventListener('DOMContentLoaded', function () {
    // Simulated attendant data (replace with actual data retrieval)
    let attendants = [
        { id: 1, name: 'John Doe', email: 'john@example.com', phone: '123-456-7890' },
        { id: 2, name: 'Jane Smith', email: 'jane@example.com', phone: '987-654-3210' },
        { id: 3, name: 'Bob Johnson', email: 'bob@example.com', phone: '555-555-5555' },
    ];

    const attendantTable = document.getElementById('attendantTable');
    const tbody = attendantTable.querySelector('tbody');

    // Function to populate the table with attendants
    function populateTable() {
        tbody.innerHTML = ''; // Clear the table first

        attendants.forEach(function (attendant) {
            const row = tbody.insertRow();
            row.insertCell(0).textContent = attendant.id;
            row.insertCell(1).textContent = attendant.name;
            row.insertCell(2).textContent = attendant.email;
            row.insertCell(3).textContent = attendant.phone;
            
            const actionsCell = row.insertCell(4);
            const editButton = document.createElement('button');
            editButton.textContent = 'Edit';
            editButton.addEventListener('click', () => openEditModal(attendant));
            const deleteButton = document.createElement('button');
            deleteButton.textContent = 'Delete';
            deleteButton.addEventListener('click', () => deleteAttendant(attendant.id));
            actionsCell.appendChild(editButton);
            actionsCell.appendChild(deleteButton);
        });
    }

    // Function to open the edit modal
    function openEditModal(attendant) {
        const editForm = document.getElementById('editForm');
        const closeModal = document.getElementById('closeModal');
        const modal = document.getElementById('editModal');
        const attendantId = document.getElementById('attendantId');
        const attendantName = document.getElementById('attendantName');
        const attendantEmail = document.getElementById('attendantEmail');
        const attendantPhone = document.getElementById('attendantPhone');

        attendantId.value = attendant.id;
        attendantName.value = attendant.name;
        attendantEmail.value = attendant.email;
        attendantPhone.value = attendant.phone;

        modal.style.display = 'block';

        closeModal.addEventListener('click', () => {
            modal.style.display = 'none';
        });

        editForm.addEventListener('submit', (event) => {
            event.preventDefault();
            const editedAttendant = {
                id: parseInt(attendantId.value),
                name: attendantName.value,
                email: attendantEmail.value,
                phone: attendantPhone.value,
            };
            updateAttendant(editedAttendant);
            modal.style.display = 'none';
        });
    }

    // Function to update an attendant's information
    function updateAttendant(editedAttendant) {
        attendants = attendants.map((attendant) =>
            attendant.id === editedAttendant.id ? editedAttendant : attendant
        );
        populateTable();
    }

    // Function to delete an attendant
    function deleteAttendant(id) {
        attendants = attendants.filter((attendant) => attendant.id !== id);
        populateTable();
    }

    // Initial population of the table
    populateTable();
});

