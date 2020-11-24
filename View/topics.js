
    document.querySelector('#btn').addEventListener('click',()=>{

        document.querySelector('.form_topics').classList.add('form_topics_display');
        document.querySelector('.form_topics').classList.remove('.form_topics')
    });

    document.querySelector('#formSend').addEventListener('click',()=>{

        document.querySelector('.form_topics_display').classList.add('form_topics');
        document.querySelector('.form_topics_display').classList.remove('.form_topics_display')
    });

