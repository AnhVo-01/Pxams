<?php
function getLastedAct($progressList) {
    echo('<div class="InprogressFeeds mb-5">');
    echo('<h3 class="Feed-title">IN PROGRESS</h3>');
    foreach($progressList as $row) {
        echo('<div class="ListItem" onclick="editStudySet('.htmlentities($row['ssid']).')">');
        echo('<div class="SetPreview">');
        if ($row['status'] === 'ACTIVE') {
            echo('<div class="TermsCount">');
            echo('<span> Terms</span>');
            if ($row['type'] === 'ENROLL') {
                echo('<a href="#" class="owned">');
                echo('<img alt="Ảnh hồ sơ" class="profile-image" height="16" referrerpolicy="no-referrer" src="" width="16">');
                echo('<span class="username"></span>');
                echo('</a>');
            }
            echo('</div>');
        }
        echo('<div class="SetPreviewTitle">');
        if($row['status'] === 'DRAFT' || $row['status'] === 'INPROGRESS') {
            echo('<span>( '.htmlentities($row['status']).' )</span>');
        }
        if($row['title']) {
            echo('<span>'.htmlentities($row['title']).'</span>');
        }
        if($row['visible_to'] == 1) {
            echo('<i class="far fa-user-friends"></i>');
        } else if ($row['visible_to'] == 2 || $row['visible_to'] == 3) {
            echo('<i class="far fa-lock-alt"></i>');
        }
        echo('</div></div>');
        echo('<button type="button" class="btn"><i class="far fa-trash"></i></button>');
        echo('</div>');
    }
    echo('</div>');
}

// function getDashboardFeed($pdo, $time) {
//     echo('<div class="InprogressFeeds mb-5">');
//     echo('<h3 class="Feed-title">IN PROGRESS</h3>');
//     foreach($progressList as $row) {
//         echo('<div class="ListItem" onclick="editStudySet('.htmlentities($row['ssid']).')">');
//         echo('<div class="SetPreview">');
//         if ($row['status'] === 'ACTIVE') {
//             echo('<div class="TermsCount">');
//             echo('<span> Terms</span>');
//             if ($row['type'] === 'ENROLL') {
//                 echo('<a href="#" class="owned">');
//                 echo('<img alt="Ảnh hồ sơ" class="profile-image" height="16" referrerpolicy="no-referrer" src="" width="16">');
//                 echo('<span class="username"></span>');
//                 echo('</a>');
//             }
//             echo('</div>');
//         }
//         echo('<div class="SetPreviewTitle">');
//         if($row['status'] === 'DRAFT' || $row['status'] === 'INPROGRESS') {
//             echo('<span>( '.htmlentities($row['status']).' )</span>');
//         }
//         if($row['title']) {
//             echo('<span>'.htmlentities($row['title']).'</span>');
//         }
//         if($row['visible_to'] == 1) {
//             echo('<i class="far fa-user-friends"></i>');
//         } else if ($row['visible_to'] == 2 || $row['visible_to'] == 3) {
//             echo('<i class="far fa-lock-alt"></i>');
//         }
//         echo('</div></div>');
//         echo('<button type="button" class="btn"><i class="far fa-trash"></i></button>');
//         echo('</div>');
//     }
//     echo('</div>');
// }