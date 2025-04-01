document.addEventListener('DOMContentLoaded', function () {
    const profileBtn = document.getElementById('profile_btn');
    const settingBtn = document.getElementById('setting_btn');
    const editBtn = document.getElementById('edit_btn');
    const deleteBtn = document.getElementById('delete_btn');
    const rewardBtn = document.getElementById('reward_btn');
    const editHeaderBtn = document.getElementById('edit_profile_btn');
    const switchBtns = document.querySelectorAll('.btn_profile, #profile_btn, #setting_btn, #edit_btn, #delete_btn, #reward_btn');
    const editLink = document.querySelector('.edit-link');

    const btnsBlock = document.querySelector(".user-info-nav")
    const profileBlock = document.querySelector('.profile');
    const settingBlock = document.querySelector('.settings');
    const deleteBlock = document.querySelector('.delete');
    const rewardBlock = document.querySelector('.reward');

    function hideAllBlocks() {
        const blocks = document.querySelectorAll(".user-info");
        blocks.forEach(block => block.classList.remove('active'));
    }

    function removeActiveClassFromButtons() {
        switchBtns.forEach(btn => btn.classList.remove('btn-active'));
    }

    profileBtn.addEventListener('click', function () {
        hideAllBlocks();
        profileBlock.classList.add('active');
        removeActiveClassFromButtons();
        profileBtn.classList.add('btn-active');
    });

    settingBtn.addEventListener('click', function () {
        hideAllBlocks();
        settingBlock.classList.add('active');
        btnsBlock.classList.add("active");
        removeActiveClassFromButtons();
        settingBtn.classList.add('btn-active');
    });

    if (editLink) {
        editLink.addEventListener('click', function () {
            hideAllBlocks();
            settingBlock.classList.add('active');
            btnsBlock.classList.add("active");
            removeActiveClassFromButtons();
            editBtn.classList.add('btn-active');
        });
    }

    if (editBtn) {
        editBtn.addEventListener('click', function () {
            hideAllBlocks();
            settingBlock.classList.add('active');
            btnsBlock.classList.add("active");
            removeActiveClassFromButtons();
            editBtn.classList.add('btn-active');
        });
    }

    if (editHeaderBtn) {
        editHeaderBtn.addEventListener('click', function () {
            hideAllBlocks();
            settingBlock.classList.add('active');
            btnsBlock.classList.add("active");
            removeActiveClassFromButtons();
            editBtn.classList.add('btn-active');
        });
    }

    if (deleteBtn) {
        deleteBtn.addEventListener('click', function () {
            hideAllBlocks();
            deleteBlock.classList.add('active');
            btnsBlock.classList.add("active");
            removeActiveClassFromButtons();
            deleteBtn.classList.add('btn-active');
        });
    }

    if (rewardBtn) {
        rewardBtn.addEventListener('click', function () {
            hideAllBlocks();
            rewardBlock.classList.add('active');
            removeActiveClassFromButtons();
            rewardBtn.classList.add('btn-active');
        });
    }

    document.querySelector('.user-info__delete_checkbox').addEventListener('change', function () {
        document.querySelector('.user-info__delete_btn').disabled = !this.checked;
    });
});