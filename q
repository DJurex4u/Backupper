[33mcommit 4029939b19356ee7e680f3d2cad876f349a8fa38[m[33m ([m[1;36mHEAD -> [m[1;32mfeature/connection_to_server[m[33m)[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Wed Jan 29 15:38:56 2020 +0100

    my implementation attempt

[33mcommit 4526bafac1ab90e77f3f9c65f9a26a6d1fd69637[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Wed Jan 29 15:01:19 2020 +0100

    not all hardcoded for SSHConector::backupDadabaseOnRemote

[33mcommit 54604237c41bc82d265813cfe7e6245302dfcbd8[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Wed Jan 29 14:05:41 2020 +0100

    we managed to connect to remote via ssh

[33mcommit f61d9cd615f98ad8140793e416dc7b0c53e5ccac[m[33m ([m[1;31morigin/feature/connection_to_server[m[33m)[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Tue Jan 28 14:25:02 2020 +0100

    Docker setup TODO

[33mcommit c1c55c8eaa747ca8c844ec13738a4971367cd85f[m
Merge: c427ad3 537cd85
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Tue Jan 28 11:40:58 2020 +0100

    Merge branch 'feature/password_encryption' into feature/connection_to_server

[33mcommit 537cd855f97e9f5cda00364991a65015b9d794d5[m[33m ([m[1;31morigin/feature/password_encryption[m[33m, [m[1;32mfeature/password_encryption[m[33m)[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Tue Jan 28 11:32:06 2020 +0100

    minor changes for pullrq

[33mcommit 80ae302550037d79c1679bd5cb697e2e65b20d14[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Fri Jan 24 14:48:10 2020 +0100

    fixed decrypt open_ssl function; pullrq

[33mcommit c427ad3efe36cbfae39c3807f612a92135fae122[m
Merge: 964a931 84d5f8a
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Fri Jan 24 13:37:33 2020 +0100

    resolved conflicts

[33mcommit 964a931c20137961fe300707aa67bbe80847f3b1[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Fri Jan 24 13:29:57 2020 +0100

    fixed: Encryptor working through DoctrineEventSubscriber; for pullrequest

[33mcommit 38a204306e3524361cedd128f8331e6c8de8757a[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Fri Jan 24 13:03:37 2020 +0100

    DoctrineEventSub partially working with Encryptor; needed generateIV refactoring

[33mcommit 1e7f55fa55752b364ff33d237b4165bd8e96a23b[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Thu Jan 23 15:52:41 2020 +0100

    problem with DI, refactoring with lifecycle events (adding EventSubscriber) NOT FINISHED - Luka

[33mcommit 3443ff7f9bfde554ad2b98d121daf211a7376d7a[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Thu Jan 23 14:19:07 2020 +0100

    added encryption for the password in BDatabase Entity

[33mcommit f13d2d08531108754fa1eb77aa94339e041cf782[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Thu Jan 23 13:44:56 2020 +0100

    added encryption for the password in Connection Entity

[33mcommit dafee6fcb066e02ab78540926bf3481943ac87c7[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Wed Jan 22 15:20:37 2020 +0100

     --ammend

[33mcommit 216c92a124df10b2369176dddaa3e6cbac858bbb[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Wed Jan 22 14:20:58 2020 +0100

    dependency injection added

[33mcommit 25b18bcc0416aefae65b35d01aeff7998341dd79[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Wed Jan 22 14:01:42 2020 +0100

    working on dependency injection of service: encryptor->connection

[33mcommit 68de8e5273f633136c8339bed77f54a6cd6d7713[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Tue Jan 21 15:48:20 2020 +0100

    should've stashed but i'm lazy

[33mcommit 1ef1bc05d524e16faaba77a824c4c49679fac812[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Tue Jan 21 15:25:30 2020 +0100

    added: encryption; need fix: decryption for password in Connection

[33mcommit 93dd8606b2137f5ac632c242bb7a0a62e13431b0[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Tue Jan 21 11:54:52 2020 +0100

    Continuing with encoding password

[33mcommit 84d5f8a9aab36e32fd52e57b41121ae3e14404b7[m[33m ([m[1;31morigin/development[m[33m, [m[1;32mdevelopment[m[33m)[m
Merge: b9c267e e7bfc99
Author: ibudos <budos@uhp-digital.com>
Date:   Tue Jan 21 08:31:52 2020 +0000

    Merged in feature/project_controller (pull request #4)
    
    Feature/project controller
    
    Approved-by: Luka Dolancic <dolancic@uhp-digital.com>

[33mcommit e7bfc998ee12cd41c3ba9caadcf8953c80407910[m[33m ([m[1;31morigin/feature/project_controller[m[33m, [m[1;32mfeature/project_controller[m[33m)[m
Merge: 6697b88 b9c267e
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Thu Jan 16 14:42:52 2020 +0100

    fixed merge conflicts

[33mcommit 08d95d87bcc54a3e988af628ee80c6ebde95fb52[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Thu Jan 16 13:34:47 2020 +0100

    .gitignore fix

[33mcommit a404181a2a0ae2a269f1b32c0628d6f5c353cebf[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Thu Jan 16 13:33:41 2020 +0100

    continuing work

[33mcommit 1b8e683c5ea7ef8314633d07bc4dccdcc801b041[m
Merge: 32d61d2 ca873ac
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Thu Jan 16 13:16:34 2020 +0100

    Merge branch 'feature/password_encryption' of https://bitbucket.org/uhpsoftware/backuper into feature/password_encryption

[33mcommit 32d61d201b2bd2312740272bb6b548b5fb58b2ab[m
Merge: 20a5bbd 91d8c76
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Thu Jan 16 13:13:45 2020 +0100

    idk: branch 'feature/password_encryption' of https://bitbucket.org/uhpsoftware/backuper into feature/password_encryption

[33mcommit ca873ac4667d531dc9327c735ef529968b2ff799[m
Merge: 20a5bbd 91d8c76
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Thu Jan 16 13:13:45 2020 +0100

    Merge branch 'feature/password_encryption' of https://bitbucket.org/uhpsoftware/backuper into feature/password_encryption

[33mcommit 20a5bbdbd52ca9808f7d84e656902eb178d2bd82[m
Merge: f194419 1b6ff4e
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Thu Jan 16 13:08:37 2020 +0100

    I don't know what happend and why but let's continue rolling

[33mcommit 91d8c7656e3203f39705f58089dc711888ae354d[m
Merge: f194419 1b6ff4e
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Thu Jan 16 13:08:37 2020 +0100

    I don't know what happend and why but let's continue rolling

[33mcommit 6697b880eca71f11c3b266dad3b9ef17843a363f[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Thu Jan 16 11:27:30 2020 +0100

    modified: every Controller's deleteAction is now using POST (not GET)

[33mcommit f76f0ab2399463e31501447ba6adfddf26c90359[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Thu Jan 16 11:16:46 2020 +0100

    modified: Connection's deleteAction is now using POST (not GET)

[33mcommit 66d9852e6c43ed550cdb66d6f8d2007a885f148c[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Thu Jan 16 11:10:25 2020 +0100

    modified: BDatabase's deleteAction is now using POST (not GET)

[33mcommit 4dd45696579b3f22c828cc349fbd4838b4f1d6a0[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Thu Jan 16 10:52:23 2020 +0100

    front fixed: bdata's update and delete buttons are in same row now

[33mcommit fb2bd89f876b751d1423d07a373c795e34c084fc[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Wed Jan 15 16:03:35 2020 +0100

    modified: BData's deleteAction is now using POST (not GET), needed: some front-end work on delete button

[33mcommit 239182ea94b3be10d36d394113f101e3f60f1a66[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Wed Jan 15 12:57:09 2020 +0100

    add: annotations to SecurityController

[33mcommit 50eeb5947c49c7e2d4eb18f724c9fa3435da5483[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Wed Jan 15 11:02:12 2020 +0100

    pullrq, deleted: auto-generated chunk of commented code in all repositories

[33mcommit 2cdfc1f9aec92a2ee44ff9af9d72ea8dd3f03652[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Wed Jan 15 10:20:44 2020 +0100

    pullrq, deleted: PHP storm header

[33mcommit 71c75b0148a09a192cddb7524a432596a1be3eae[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Wed Jan 15 10:17:05 2020 +0100

    fix: .gitignore

[33mcommit 64fcc3054c68d9b267185b318a48d1196d6e9310[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Wed Jan 15 10:12:02 2020 +0100

    added: /.idea to .gitignore

[33mcommit f1944197f4cfaf4415d8fe217778f0b4b8c22fae[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Thu Dec 12 16:03:57 2019 +0100

    Armando the interface master +1

[33mcommit 1b6ff4e8b78c35e4dc0b6bfaa4015e356128d4f0[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Thu Dec 12 16:03:57 2019 +0100

    Armando the interface master

[33mcommit 0aa53acc86f6da2d21284ea50b727e38c568b178[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Thu Dec 12 11:01:48 2019 +0100

    added: choiceType in updateAction for BDatabaseController

[33mcommit 27bc282ddd3a8c3cbca2f6a8357336cd9db58977[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Wed Dec 11 16:12:10 2019 +0100

    mend

[33mcommit 5476bcb2733a86e8f3e7869179450925631362d9[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Wed Dec 11 15:50:38 2019 +0100

    mend

[33mcommit ed0448a7e695288bc9a3fed9eda6df2f57109149[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Wed Dec 11 15:48:44 2019 +0100

    added: ChoiceType (drop-list) for dbSchema&driver in BDatabaseController

[33mcommit 92aaa40ef459c07f1f6277f9a68305d85131218c[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Wed Dec 11 12:41:10 2019 +0100

    added: cascade={remove} on Project

[33mcommit 5f4a16ea963b31927da7a6111645d42f892c7928[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Wed Dec 11 10:03:48 2019 +0100

    Added: bDataController, CRUD with backend validation working; Fixed
    "goBack" problem when creating&updating stuff

[33mcommit 2a44262959b5db5272dc467af93c25a1dad09141[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Tue Dec 10 16:20:32 2019 +0100

    added: CRUD /w backend validation for bData

[33mcommit c78fd773808287e7e698968cb76910d6ed97c479[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Tue Dec 10 16:16:57 2019 +0100

    added: CRUD /wo validation for bData

[33mcommit e373d025eb697d33faae323ea23a6e77e6a961a5[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Tue Dec 10 15:53:59 2019 +0100

    mend

[33mcommit 9dd0ac84f2ece24b22201325bfcedf095a12dbd7[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Tue Dec 10 15:50:40 2019 +0100

    added: deleteAction for bData

[33mcommit 8b0c95f6bf9357cfb8e48a9c1cce0d2715eaa9cb[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Tue Dec 10 15:15:47 2019 +0100

    changed:depricated @Method; added: bData deleteAction

[33mcommit 49328e36628d26538d40c01e655afabe1544be47[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Tue Dec 10 14:20:22 2019 +0100

    added: success flashedMessage for every action in Project,Connection;BDatabaseController

[33mcommit 46eb478927d8cd3c62ee59ff62fe92f6ba5e05fe[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Tue Dec 10 13:36:31 2019 +0100

    working: CRUD for database

[33mcommit 506b41f2d70e4fc9dc99567409a501da1c13e020[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Tue Dec 10 13:17:00 2019 +0100

    added: backend validation for createAction for bDatabase

[33mcommit 6fc546b443a2dd6e89b2729df620c57f94727f7a[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Tue Dec 10 12:53:35 2019 +0100

    added: createAction for bDatabase

[33mcommit d2941a9d505d150fca7faeb985ba83e24c6388af[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Tue Dec 10 11:45:13 2019 +0100

    added: deleteAction fot bDatabase

[33mcommit 7e4e3b51b03611e3fe1bf076fa20e55085319182[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Tue Dec 10 11:03:42 2019 +0100

    working: CRUD for Connections

[33mcommit f60c2a9c10d61dbb2b64cd7aa4cc8301293a4780[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Tue Dec 10 10:56:03 2019 +0100

    fix: createAction /w validation in ProjectController

[33mcommit 14ddb25330c88bbb02797b1a82cef319b772b085[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Thu Dec 5 16:07:32 2019 +0100

    mend

[33mcommit 6672541764c2b6cf658a5a900fa52e5a80a76848[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Thu Dec 5 16:04:41 2019 +0100

    ConnectionController added: backend validation on createAction

[33mcommit b2d8d321df1a95807e445bec10ff337562786810[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Thu Dec 5 15:55:01 2019 +0100

    ProjectController fixed: createAction with backend validation

[33mcommit a293e9f8e846e30372298c48ed78a42309c61a65[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Thu Dec 5 15:25:21 2019 +0100

    ConnectionController - createAction added, updateAction needed

[33mcommit 019222c7432a7a0c4b7048f01cace18a579db9e9[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Thu Dec 5 14:05:16 2019 +0100

    ConnectoinRepository - delete added, create & update needed

[33mcommit ae71f30e0ec4013be006ef7223abf882c54da7be[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Thu Dec 5 11:25:36 2019 +0100

    Read, Updata, Delete buttons added, implementation needed

[33mcommit 72af12796412ea6d46af9acdfd88310bc4041cd1[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Thu Dec 5 10:11:50 2019 +0100

    read for Connections, Databases and Data added; update&delete needed

[33mcommit b9c267e052b3aaabb871c7c946ad29c8c76aca42[m
Merge: 7037029 05f898f
Author: ibudos <budos@uhp-digital.com>
Date:   Wed Dec 4 15:26:07 2019 +0000

    Merged in feature/user_system (pull request #3)
    
    Feature/user system
    
    Approved-by: Luka Dolancic <dolancic@uhp-digital.com>

[33mcommit 05f898f67cb161e1ae4977863d2110c1a6d8bd52[m[33m ([m[1;31morigin/feature/user_system[m[33m, [m[1;32mfeature/user_system[m[33m)[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Wed Dec 4 16:24:50 2019 +0100

    ready to merge

[33mcommit ec09c7934d0f62c66457c30ff3a97d626f839e4d[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Wed Dec 4 16:22:10 2019 +0100

    end of day 4.12.2019

[33mcommit 9af9281b8488b799c0431477c71b38ed0accbdbe[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Wed Dec 4 15:48:53 2019 +0100

     'return persistantCollection' for getBDatabases in Project.php

[33mcommit bc5788c1c4a9aeb6f3eebdf1a000dd84f061aef5[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Wed Dec 4 13:35:18 2019 +0100

    mend

[33mcommit d5cba6bfcd5592a8c56e9f640cf7b789ab130812[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Wed Dec 4 13:28:42 2019 +0100

    ConnectionFixture working with bData & bDatabase = NULL

[33mcommit 6751d57ebf1ec4d7ecc452399555ae29348aa029[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Wed Dec 4 12:23:03 2019 +0100

    try to fix error: Reference to 'project_0' does not exist

[33mcommit 6fceb07491e05c934a05d991b7a1eccdc4603425[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Wed Dec 4 10:39:20 2019 +0100

    AppFixture deleted; blank ConnectionFixture added

[33mcommit 651ab31ecb12124f0434b693457efd142fe188f9[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Wed Dec 4 10:20:02 2019 +0100

    auto-generated repositories deleted

[33mcommit 805c9cc0a87e38bc621ea881356c551117fc3a29[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Wed Dec 4 10:08:55 2019 +0100

    Project.php: unnecessary vertical spaces removed

[33mcommit f3e92c7a911341cce5241d3b83ac25221d5b8745[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Wed Dec 4 10:05:28 2019 +0100

    SecurityController some format/indentation fixed

[33mcommit af97fd14a8498341d7f5f17621b6d952682b1337[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Wed Dec 4 09:41:32 2019 +0100

    provider name changed  myProvider -> db_user_provider

[33mcommit 33e21fae87e00fff2bd7da6d449dda86354ef360[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Wed Dec 4 09:33:29 2019 +0100

    mend

[33mcommit 1e0d624989dc2773afefd6e3a686226fa418dfe0[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Wed Dec 4 09:31:40 2019 +0100

    mend

[33mcommit eaa9d321efd9cb54f3eca3b71ed20b0e6f11e111[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Tue Dec 3 16:01:42 2019 +0100

    idea file

[33mcommit c7fcfdffe80a6f04a0d4986d7b5ed2b5bab19038[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Tue Dec 3 15:32:52 2019 +0100

    CRUD - backend validation added

[33mcommit ac82fdd25278fcdaf22d30d9d1b6fee14e93f4c5[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Tue Dec 3 13:18:31 2019 +0100

    CRUD is working

[33mcommit 263a0c74b31feee35166514b0c70457f69c9ac3c[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Tue Dec 3 12:58:56 2019 +0100

    DeleteButton done! UpdateButton implementation needed

[33mcommit 0cb0d606a02092de3d08e3c7b90c79fce08bf1b8[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Tue Dec 3 11:05:53 2019 +0100

    week3 begins; delete button in table is functioning; delete button in show needs dialog

[33mcommit 8d5a674654bac7e7d5dd6b752445929c77c45582[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Fri Nov 29 15:17:59 2019 +0100

    Delete button working; some main.js logic needed

[33mcommit 48180d1698a060d4d9e46997d41e3edf0f245c1e[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Fri Nov 29 11:18:51 2019 +0100

    read list working; read one partially woring

[33mcommit 845b4c4487969d252fc9d22332a41fb282137414[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Thu Nov 28 16:14:54 2019 +0100

    project/list route finished; others needed

[33mcommit da4eed8b2b49b2668e3e3ccf37b388f0f6056beb[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Thu Nov 28 16:08:29 2019 +0100

    Made ProjectFixture.php - working

[33mcommit c357781560def7b2550156a3c38d4474373fdc2f[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Thu Nov 28 15:50:25 2019 +0100

    Little front work

[33mcommit 8b273e71cd70e15837caa3477f1279d1beb534e1[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Thu Nov 28 15:04:13 2019 +0100

    Routes from ProjectController are valid, but not fully implemented

[33mcommit 7037029cc03fddaa63413529cb0e23e51b7dad6b[m
Merge: 763de62 3b9971a
Author: ibudos <budos@uhp-digital.com>
Date:   Thu Nov 28 09:46:48 2019 +0000

    Merged in feature/models (pull request #2)
    
    Feature/models
    
    Approved-by: Armando Vlajcic <vlajcic@uhp-digital.com>

[33mcommit 14c1752eae7a610ddf8c1d3157f843014400b114[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Thu Nov 28 10:39:54 2019 +0100

    Gitignore fix, removed .idea subfolder (Luka)

[33mcommit 10da1775c9a2d340c6d09797bd564a05f2e33dac[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Thu Nov 28 10:36:26 2019 +0100

    Temporary commit (Luka)

[33mcommit 79f990fd93a31c6eb2e69baebc6c11a660f01ded[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Thu Nov 28 09:09:48 2019 +0100

    for review

[33mcommit 0807b62197a0701d57cd27371fd9f90c7e7eac5f[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Wed Nov 27 15:54:22 2019 +0100

    Login, Logout, Access control WORKING

[33mcommit 06cc959f94af104967e382d16bd296881de2dd69[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Wed Nov 27 15:49:20 2019 +0100

    Login, Logout working; Access control not so much

[33mcommit 5ea632e00d4597d901c17fcdaad372aab53b659f[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Wed Nov 27 13:50:38 2019 +0100

    Login working; Deny acces nedded

[33mcommit f8c825424b2a1ed017445bc3568a42b99972910e[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Wed Nov 27 12:18:13 2019 +0100

    Fixture working

[33mcommit 1ab84bd4d8435e9e8259bc527023b6acbc1a60f8[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Wed Nov 27 09:49:55 2019 +0100

    Fixtures working

[33mcommit ea4f57514eccd06d6d8b2539dbc8c10cf3f4ccef[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Fri Nov 22 16:19:32 2019 +0100

    day4, ENCODER NEEDED

[33mcommit 5d76cceead96ee0374db88ebd0f4886120ef5e87[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Fri Nov 22 14:46:12 2019 +0100

    login displays errors, not connected to DB yet

[33mcommit 5cb6667113818fe0477544225ad4bc633c9bb0d8[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Fri Nov 22 13:07:36 2019 +0100

    Route backuper/login is up

[33mcommit b52066522c5c2e4cdb7e445c5c92715b37aa183a[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Fri Nov 22 11:10:44 2019 +0100

    User.php - $email unique added

[33mcommit 68fddd6aa2b81985b465917e9f6940eef03f4a1e[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Fri Nov 22 11:07:10 2019 +0100

    User.php some getters added

[33mcommit ec4ad9f5a0e2e2d3ad5f22797766ffba3b1ab1fc[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Fri Nov 22 10:58:28 2019 +0100

    SecurityControleer added, User.php naming consistency fixed

[33mcommit bc887c17bc7d8562eb3d561d1abd251034e7bb05[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Fri Nov 22 10:03:35 2019 +0100

    Updated security.yaml

[33mcommit 7e664a724e9ccb41b24c2085d4825556dcd39d6a[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Fri Nov 22 09:55:39 2019 +0100

    User.php now has e-mail instead of username

[33mcommit d409940e0ef9579e028ef9d373b03018abfb4c23[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Thu Nov 21 16:06:44 2019 +0100

    User implements skeleton of UserInterface, end of day3

[33mcommit 3b9971ae0b11f80bd92a2ec38832bb3565886e88[m[33m ([m[1;31morigin/feature/models[m[33m, [m[1;32mfeature/models[m[33m)[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Thu Nov 21 13:27:49 2019 +0100

    For review 2

[33mcommit ce241396769b4b0a3059b18eda4906f8e1664e8b[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Thu Nov 21 10:37:08 2019 +0100

    For reviw. Changed db names of atributes, minor spelling errors, fixed some bad assosiations.

[33mcommit c0f3314108c71f1c954eb2720b9213b9a23e3716[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Thu Nov 21 09:41:58 2019 +0100

    Fixed bad assosiation syntax. (tnx Luka)

[33mcommit 3f4ac254533b6702f441686a0f603dd848e2fe61[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Wed Nov 20 17:03:38 2019 +0100

    fail, second day

[33mcommit 221ec8bf6fba54aeca0f270a6f1f206582b26b30[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Wed Nov 20 15:53:42 2019 +0100

    all bidirectional assosiations completed

[33mcommit 4a616777f0736bced656f86b3284307789b0d36a[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Wed Nov 20 15:47:12 2019 +0100

    bidirectional assosiation: BDatabase&PeriodType

[33mcommit 68e05621f26d196e96601f797f53d2c9d1ba203e[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Wed Nov 20 15:20:53 2019 +0100

    all bidirectional assosiations with Project

[33mcommit f906613b18ac5fbf8b73b55ccf1ed16efda66c50[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Wed Nov 20 14:39:16 2019 +0100

    Data class renamed to BData

[33mcommit df6e4770a0f835ed942e667810d7e3f3eab798d0[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Wed Nov 20 14:29:53 2019 +0100

    bidirectional relation Connection-Project

[33mcommit 05c7e1fccfdd6a81627d5b40a40bb38308d537a2[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Wed Nov 20 12:07:48 2019 +0100

    Database FK to Connection; Data FK to Connection

[33mcommit 528358adfec7df824429b95eb2d4484ba3c5ba98[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Wed Nov 20 11:38:48 2019 +0100

    Project FK to Data

[33mcommit f83a9a96dc81b664b1a6e0c56d45bf077ff13d92[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Wed Nov 20 11:30:13 2019 +0100

    Project FK to Database

[33mcommit f7e3b816be799875b84772bc75c3ded2273434bf[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Wed Nov 20 11:13:42 2019 +0100

    Project FK in Connection

[33mcommit df709c5e9a3b24c44d6e12c27ddb5090c5dab39a[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Tue Nov 19 16:36:18 2019 +0100

    first day

[33mcommit 7268fa1618ed56ebd078bd6887634b1cb11daa7e[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Tue Nov 19 16:20:34 2019 +0100

    Entities added

[33mcommit 763de6204a8028444751121702a81f118ae399a6[m
Merge: 7dcd1bb 9851dfe
Author: ibudos <budos@uhp-digital.com>
Date:   Tue Nov 19 13:21:42 2019 +0000

    Merged in feature/symfony_setup (pull request #1)
    
    init2
    
    Approved-by: Armando Vlajcic <vlajcic@uhp-digital.com>

[33mcommit 9851dfe875b55d10199699b2007f1b0ad8c84b86[m[33m ([m[1;31morigin/feature/symfony_setup[m[33m, [m[1;32mfeature/symfony_setup[m[33m)[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Tue Nov 19 14:20:48 2019 +0100

    init2

[33mcommit 7dcd1bb0adecd53412dc6834e124ce18cda135b8[m[33m ([m[1;31morigin/release[m[33m, [m[1;31morigin/master[m[33m, [m[1;32mmaster[m[33m)[m
Author: Ivan Budoš <budos@uhp-digital.com>
Date:   Tue Nov 19 13:32:48 2019 +0100

    init
