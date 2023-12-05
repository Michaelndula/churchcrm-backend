<script src="assets/js/toggle_bar.js"></script>
<script>
    // the routing function
    const currentRoute = window.location.href;
    const navLinks = document.querySelectorAll('.nav-link');
    navLinks.forEach(link => {
        const linkHref = link.querySelector('a').href;
        if (currentRoute.includes(linkHref)) {
            link.classList.add('active-link');
        }
    });

    // the modal function script
    function openModal() {
        document.getElementById('modal').style.display = 'block';
        document.addEventListener('click', closeModalOutside);
    }

    function closeModal() {
        document.getElementById('modal').style.display = 'none';
        document.removeEventListener('click', closeModalOutside);
    }

    function closeModalOutside(event) {
        var modal = document.getElementById('modal');
        if (event.target === modal) {
            modal.style.display = 'none';
            document.removeEventListener('click', closeModalOutside);
        }
    }
</script>



{{-- Ajax Deletions --}}
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function deleteAnnouncement(id) {
        $.ajax({
            url: '/delete/' + id + '/announcement/',
            type: 'DELETE',
            success: function() {
                $('#announcement_' + id).remove();
                alert('Announcement deleted successfully');
            },
            error: function(xhr, status, error) {
                console.error('Error:', xhr.responseText);
                alert('An error occurred while deleting the announcement.');
            }
        });
    };
    //delete sermon notes
    function deleteSermonNotes(id) {
        $.ajax({
            url: '/delete/' + id + '/sermonnotes/',
            type: 'DELETE',
            success: function() {
                $('#sermonnotes_' + id).remove();
                alert('sermonnotes deleted successfully');
            },
            error: function(xhr, status, error) {
                console.error('Error:', xhr.responseText);
                alert('An error occurred while deleting the sermonnotes.');
            }
        });
    }
    //deleteEvent
    function deleteEvent(id) {
        $.ajax({
            url: '/delete/' + id + '/event/',
            type: 'DELETE',
            success: function() {
                $('#event_' + id).remove();
                alert('event deleted successfully');
            },
            error: function(xhr, status, error) {
                console.error('Error:', xhr.responseText);
                alert('An error occurred while deleting the event.');
            }
        });
    }
</script>