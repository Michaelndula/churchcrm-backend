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

{{-- Profile Modal --}}
<script>
    function openProfileModal() {
        document.getElementById('profile-modal').style.display = 'block';
        document.addEventListener('click', closeModalOutside);
    }

    function closeProfileModal() {
        document.getElementById('profile-modal').style.display = 'none';
        document.removeEventListener('click', closeModalOutside);
    }

    function closeProfileModalOutside(event) {
        var modal = document.getElementById('profile-modal');
        if (event.target === modal) {
            modal.style.display = 'none';
            document.removeEventListener('click', closeModalOutside);
        }
    }
</script>

{{-- User Modal --}}
<script>
    function openUserModal(username, email, phone) {
        document.getElementById('user-modal').style.display = 'block';

        userId = document.querySelector('.card .card-body .table .table-body tr td button').getAttribute(
        'data-user-id');

        var updateUrl = "{{ route('users.update', ':userId') }}";
        updateUrl = updateUrl.replace(':userId', userId);

        document.getElementById("user-modal").action = updateUrl;

        console.log('User ID:', userId);
        document.querySelector('#user-modal .modal-content .modal-head h4').textContent = username
        document.querySelector('#user-modal .modal-content .modal-body #user-email').value = email;

        document.addEventListener('click', closeModalOutside);
    }

    function closeUserModal() {
        document.getElementById('user-modal').style.display = 'none';
        document.removeEventListener('click', closeModalOutside);
    }

    function closeUserModalOutside(event) {
        var modal = document.getElementById('user-modal');
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

{{-- ------------- Scroll Carousel --------------- --}}
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const scrollImages = document.querySelector(".scroll-images");
        const scrollLength = scrollImages.scrollWidth - scrollImages.clientWidth;
        const leftButton = document.querySelector(".left");
        const rightButton = document.querySelector(".right");

        function checkScroll() {
            const currentScroll = scrollImages.scrollLeft;
            if (currentScroll === 0) {
                leftButton.setAttribute("disabled", "true");
                rightButton.removeAttribute("disabled");
            } else if (currentScroll === scrollLength) {
                rightButton.setAttribute("disabled", "true");
                leftButton.removeAttribute("disabled");
            } else {
                leftButton.removeAttribute("disabled");
                rightButton.removeAttribute("disabled");
            }
        }

        scrollImages.addEventListener("scroll", checkScroll);
        window.addEventListener("resize", checkScroll);
        checkScroll();

        function leftScroll() {
            scrollImages.scrollBy({
                left: -200,
                behavior: "smooth"
            });
        }

        function rightScroll() {
            scrollImages.scrollBy({
                left: 200,
                behavior: "smooth"
            });
        }

        leftButton.addEventListener("click", leftScroll);
        rightButton.addEventListener("click", rightScroll);
    });
</script>
