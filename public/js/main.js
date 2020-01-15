(function () {
    'use strict';

    let cmds = document.getElementsByClassName('del');
    let i;

    for (i = 0; i < cmds.length; i++) {
        cmds[i].addEventListener('click', function (e) {
            e.preventDefault();
            if (confirm('削除してもよろしいですか？')) {
                document.getElementById('form_' + this.dataset.id).submit();
            }
        });
    }
})();
