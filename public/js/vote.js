
window.onload = () => {

    let posts = document.querySelector('.posts');
    posts.addEventListener('click', handleVote);
    let form;

    function handleVote(e) {
        let button = e.target.closest('.vote-btn');

        if (!button || !button.value) return;

        form = button.closest('.voteForm');

        if (form) {
            e.preventDefault();
            setVoteBtn(button, form);
        }

    }

    function setVoteBtn(button, form) {

        const vote = button.value;
        const photo_id = button.getAttribute('data-photo_id');
        const data_clicked = button.getAttribute('data-clicked');
        const upvoteSvg = form.querySelector('[value="up"] svg');
        const downvoteSvg = form.querySelector('[value="down"] svg');
        const counter = form.querySelector('.counter');

        if (vote == 'up') {
            if (data_clicked == 'true') {
                handleSetAttribute(upvoteSvg, 'fill', 'none');
                handleSetAttribute(button, 'data-clicked', 'false');
                counter.innerHTML = counter.dataset.value == '' ? '' : parseInt(counter.innerHTML) - parseInt(1);
            } else {
                handleSetAttribute(button, 'data-clicked', 'true');
                handleSetAttribute(upvoteSvg, 'fill', '#00a313');
                handleSetAttribute(downvoteSvg, 'fill', 'none');
                handleSetAttribute(form.querySelector('[value="down"]'), 'data-clicked', 'false');
                counter.innerHTML = counter.dataset.value == '' ? parseInt(1) : parseInt(counter.innerHTML) + parseInt(1);
            }

        } else if (vote == 'down') {
            if (data_clicked == 'true') {
                handleSetAttribute(downvoteSvg, 'fill', 'none');
                handleSetAttribute(button, 'data-clicked', 'false');
            } else {
                handleSetAttribute(button, 'data-clicked', 'true');
                handleSetAttribute(downvoteSvg, 'fill', '#fb4141');
                handleSetAttribute(upvoteSvg, 'fill', 'none');
                handleSetAttribute(form.querySelector('[value="up"]'), 'data-clicked', 'false');
                counter.innerHTML = counter.dataset.value == '' ? '' : parseInt(counter.innerHTML) - parseInt(1);
            }
        }
        
        sendVote(vote, photo_id);
    }

    function handleSetAttribute(element, attr, val) {
        element.setAttribute(attr, val);
    }

    function sendVote(vote, photo_id) {
        const url = '/vote';
        const data = { vote: vote, photo_id: photo_id };
        const csrfToken = form.querySelector('input[name="_token"]').value;

        fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            },
            body: JSON.stringify(data)
        }).then(response => {
            if (!response.ok) {
                throw new Error(response.statusText);
            }
            return response.json();
        }).then(data => {
            // console.log('Success: ', data);
        }).catch(err => {
            // console.log(err);
        });
    }
};