document.addEventListener('DOMContentLoaded', () => {
    const activityBtn = document.getElementById('activity_btn')
    const statisticBtn = document.getElementById('statistic_btn')
    const btns = document.querySelectorAll('#activity_btn, #statistic_btn')

    const activeBlock = document.querySelector('.activity')
    const statisticBlock = document.querySelector('.statistic')

    function hideBlocks() {
        const blocksInformation = document.querySelectorAll('.user-information')
        blocksInformation.forEach(block => block.classList.remove('active'))
    }

    function deleteActiveClassBtn() {
        btns.forEach(btn => btn.classList.remove('btn-active'))
    }

    activityBtn.addEventListener('click', () => {
        hideBlocks();
        activeBlock.classList.add('active');
        deleteActiveClassBtn();
        activityBtn.classList.add('btn-active');
    })

    statisticBtn.addEventListener('click', () => {
        hideBlocks();
        statisticBlock.classList.add('active');
        deleteActiveClassBtn();
        statisticBtn.classList.add('btn-active');
    })
});