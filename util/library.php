<?php
function getLastedAct($progressList) {
    if($progressList){
        echo('<h3 class="Feed-title">IN PROGRESS</h3>');
        foreach($progressList as $row) {
            if ($row['active'] == 1 && $row['status'] !== 'ACTIVE') {
                echo('<div class="ListItemGroup" oncontextmenu="option('.htmlentities($row['ssid']).'); return false;">');
                echo('<a class="ListItem" href="?redirect=studyset&ssid='.htmlentities($row['ssid']).'">');
                echo('<div class="SetPreview">');
                echo('<div class="SetPreviewTitle">');
                echo('<span>( '.htmlentities($row['status']).' )</span>');
                if($row['title']) {
                    echo('<span>'.htmlentities($row['title']).'</span>');
                }
                if($row['visible_to'] == 1) {
                    echo('<i class="far fa-user-friends"></i>');
                } else if ($row['visible_to'] == 2 || $row['visible_to'] == 3) {
                    echo('<i class="far fa-lock-alt"></i>');
                }
                echo('</div></div></a>');
                echo('<ul class="ss-menu" id="menu-'.htmlentities($row['ssid']).'">');
                echo('<li><button class="btn menu-item" onclick="setDataForDel('.$row['ssid'].', 1);" data-bs-toggle="modal" data-bs-target="#confirm">');
                echo('<i class="far fa-trash"></i><span>Remove</span>');
                echo('</button></li>');
                echo('</ul>');
                echo('</div>');
            }
        }
    }
}

function getDashboardFeed($pdo, $uid, $month, $year) {
    $stmt = $pdo->prepare("SELECT ss.ssid, title, ass.create_by, ass.owner_id, avatar, acc.user_name, ass.date, rs.terms,
                    status, visible_to, ass.type, active FROM `study_set` AS ss 
                    INNER JOIN `account_study_set` AS ass ON ss.ssid = ass.ss_id
                    INNER JOIN `account` acc ON ass.owner_id = acc.account_id
                    INNER JOIN (SELECT ssid, COUNT(*) as terms FROM `question_table` qt 
                    INNER JOIN `account_study_set` ass1 ON qt.ssid = ass1.ss_id GROUP BY ssid) AS rs ON ass.ss_id = rs.ssid
                    WHERE status = 'ACTIVE' AND active = 1 AND ass.create_by=:accId AND MONTH(ass.date)={$month} AND YEAR(ass.date)={$year}");
    $stmt->execute(array(
        ':accId' => $uid
    ));
    $listSet = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $listMonth = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    
    if ($listSet) {
        echo('<div class="DashboardFeedGroup">');
        echo('<h3 class="Feed-title">IN '.$listMonth[$month-1].' '.$year.'</h3>');
        foreach($listSet as $set) {
            echo('<div class="ListItemGroup" oncontextmenu="option('.htmlentities($set['ssid']).'); return false;">');
            echo('<div class="ListItem" onclick="viewFlashcard('.htmlentities($set['ssid']).')">');
            echo('<div class="SetPreview">');
            echo('<div class="TermsCount">');
            echo('<span>'.$set['terms'].' Terms</span>');
            echo('<a href="#" class="owned">');
            echo('<img alt="Ảnh hồ sơ" class="profile-image" height="16" referrerpolicy="no-referrer" src="assets/image/3.png" width="16">');
            echo('<span class="username">'.$set['user_name'].'</span>');
            echo('</a>');
            echo('</div>');
            echo('<div class="SetPreviewTitle">');
            echo('<span>'.$set['title'].'</span>');
            if($set['visible_to'] == 1) {
                echo('<i class="far fa-user-friends"></i>');
            } else if ($set['visible_to'] == 2 || $set['visible_to'] == 3) {
                echo('<i class="far fa-lock-alt"></i>');
            }
            echo('</div></div></div>');
            echo('<ul class="ss-menu" id="menu-'.htmlentities($set['ssid']).'">');
            if ($set['type'] == 'OWNED') {
                $type = 1;
                echo('<li><a href="?redirect=studyset&ssid='.$set['ssid'].'" class="btn menu-item"><i class="fas fa-pen"></i>Edit</a></li>');
            } else {
                $type = 0;
            }
            echo('<li><button type="button" class="btn menu-item" onclick="setDataForDel('.$set['ssid'].', '.$type.');" data-bs-toggle="modal" data-bs-target="#confirm">');
            echo('<i class="far fa-trash"></i><span>Remove</span>');
            echo('</button></li>');
            echo('</ul>');
            echo('</div>');
        }
        echo('</div>');
    }
}
?>