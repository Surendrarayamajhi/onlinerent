<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="./style/styles.css" />

    <link rel="stylesheet" href="./style/Chat.css" />

    <title>OnlineRent Admin</title>
</head>

<body id="body">
    <div class="css-container">
        <nav class="navbar">
            <div class="nav_icon" onclick="toggleSidebar()">
                <i class="fa fa-bars" aria-hidden="true"></i>
            </div>
            <div class="navbar__left">

            </div>
            <div class="navbar__right">
                <a href="#">
                    <i class="fa fa-search" aria-hidden="true"></i>
                </a>
                <!-- <a href="#">
            <i class="fa fa-clock-o" aria-hidden="true"></i>
          </a> -->
                <a href="#">
                    <img width="30" src="assets/avatar.svg" alt="" />
                    <!-- <i class="fa fa-user-circle-o" aria-hidden="true"></i> -->
                </a>
            </div>
        </nav>

        <main>

            <div class="main__container">

                <div class="">


                    <div class="row rounded-lg overflow-hidden shadow">
                        <!-- Users box-->
                        <div class="col-4 px-0">
                            <div class="bg-white">

                                <div class="bg-gray px-4 py-2 bg-light">
                                    <p class="h5 mb-0 py-1">Recen Chat</p>
                                </div>

                                <div class="messages-box">
                                    <div class="list-group rounded-0">
                                        <a class="list-group-item list-group-item-action active text-white rounded-0">
                                            <div class="media d-flex align-items-start gap-2">
                                                <img src="https://bootstrapious.com/i/snippets/sn-chat/avatar.svg" alt="user" width="50" class="rounded-circle">
                                                <div class="media-body ml-4">
                                                    <div class="d-flex align-items-center justify-content-between mb-1">
                                                        <h6 class="mb-0">Jason Doe</h6><small class="small font-weight-bold">25 Dec</small>
                                                    </div>
                                                    <p class="font-italic mb-0 text-small one-line" style="line-height: 1; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.
                                                    </p>

                                                </div>
                                            </div>
                                        </a>

                                        <a href="#" class="list-group-item list-group-item-action list-group-item-light rounded-0">
                                            <div class="media"><img src="https://bootstrapious.com/i/snippets/sn-chat/avatar.svg" alt="user" width="50" class="rounded-circle">
                                                <div class="media-body ml-4">
                                                    <div class="d-flex align-items-center justify-content-between mb-1">
                                                        <h6 class="mb-0">Jason Doe</h6><small class="small font-weight-bold">14 Dec</small>
                                                    </div>
                                                    <p class="font-italic text-muted mb-0 text-small">Lorem ipsum dolor sit amet, consectetur. incididunt ut labore.</p>
                                                </div>
                                            </div>
                                        </a>

                                        <a href="#" class="list-group-item list-group-item-action list-group-item-light rounded-0">
                                            <div class="media"><img src="https://bootstrapious.com/i/snippets/sn-chat/avatar.svg" alt="user" width="50" class="rounded-circle">
                                                <div class="media-body ml-4">
                                                    <div class="d-flex align-items-center justify-content-between mb-1">
                                                        <h6 class="mb-0">Jason Doe</h6><small class="small font-weight-bold">9 Nov</small>
                                                    </div>
                                                    <p class="font-italic text-muted mb-0 text-small">consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</p>
                                                </div>
                                            </div>
                                        </a>

                                        <a href="#" class="list-group-item list-group-item-action list-group-item-light rounded-0">
                                            <div class="media"><img src="https://bootstrapious.com/i/snippets/sn-chat/avatar.svg" alt="user" width="50" class="rounded-circle">
                                                <div class="media-body ml-4">
                                                    <div class="d-flex align-items-center justify-content-between mb-1">
                                                        <h6 class="mb-0">Jason Doe</h6><small class="small font-weight-bold">18 Oct</small>
                                                    </div>
                                                    <p class="font-italic text-muted mb-0 text-small">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</p>
                                                </div>
                                            </div>
                                        </a>

                                        <a href="#" class="list-group-item list-group-item-action list-group-item-light rounded-0">
                                            <div class="media"><img src="https://bootstrapious.com/i/snippets/sn-chat/avatar.svg" alt="user" width="50" class="rounded-circle">
                                                <div class="media-body ml-4">
                                                    <div class="d-flex align-items-center justify-content-between mb-1">
                                                        <h6 class="mb-0">Jason Doe</h6><small class="small font-weight-bold">17 Oct</small>
                                                    </div>
                                                    <p class="font-italic text-muted mb-0 text-small">consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</p>
                                                </div>
                                            </div>
                                        </a>

                                        <a href="#" class="list-group-item list-group-item-action list-group-item-light rounded-0">
                                            <div class="media"><img src="https://bootstrapious.com/i/snippets/sn-chat/avatar.svg" alt="user" width="50" class="rounded-circle">
                                                <div class="media-body ml-4">
                                                    <div class="d-flex align-items-center justify-content-between mb-1">
                                                        <h6 class="mb-0">Jason Doe</h6><small class="small font-weight-bold">2 Sep</small>
                                                    </div>
                                                    <p class="font-italic text-muted mb-0 text-small">Quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                                </div>
                                            </div>
                                        </a>

                                        <a href="#" class="list-group-item list-group-item-action list-group-item-light rounded-0">
                                            <div class="media"><img src="https://bootstrapious.com/i/snippets/sn-chat/avatar.svg" alt="user" width="50" class="rounded-circle">
                                                <div class="media-body ml-4">
                                                    <div class="d-flex align-items-center justify-content-between mb-1">
                                                        <h6 class="mb-0">Jason Doe</h6><small class="small font-weight-bold">30 Aug</small>
                                                    </div>
                                                    <p class="font-italic text-muted mb-0 text-small">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</p>
                                                </div>
                                            </div>
                                        </a>

                                        <a href="#" class="list-group-item list-group-item-action list-group-item-light rounded-0">
                                            <div class="media"><img src="https://bootstrapious.com/i/snippets/sn-chat/avatar.svg" alt="user" width="50" class="rounded-circle">
                                                <div class="media-body ml-4">
                                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                                        <h6 class="mb-0">Jason Doe</h6><small class="small font-weight-bold">21 Aug</small>
                                                    </div>
                                                    <p class="font-italic text-muted mb-0 text-small">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</p>
                                                </div>
                                            </div>
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Chat Box-->
                        <div class="col-8 px-0">
                            <div class="px-4 py-5 chat-box bg-white">
                                <!-- Sender Message-->
                                <div class="media w-50 mb-3 d-flex align-items-start gap-2"><img src="https://bootstrapious.com/i/snippets/sn-chat/avatar.svg" alt="user" width="50" class="rounded-circle">
                                    <div class="media-body ml-3">
                                        <div class="bg-light rounded py-2 px-3 mb-2">
                                            <p class="text-small mb-0 text-muted">Test which is a new approach all solutions</p>
                                        </div>
                                        <p class="small text-muted">12:00 PM | Aug 13</p>
                                    </div>
                                </div>

                                <!-- Reciever Message-->
                                <div class="w-100 d-flex justify-content-end">
                                    <div class="media w-50 ml-auto mb-3">
                                        <div class="media-body">
                                            <div class="bg-primary rounded py-2 px-3 mb-2">
                                                <p class="text-small mb-0 text-white">Test which is a new approach to have all MY MESSsolutions</p>
                                            </div>
                                            <p class="small text-muted">12:00 PM | Aug 13</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Sender Message-->
                                <div class="media w-50 mb-3"><img src="https://bootstrapious.com/i/snippets/sn-chat/avatar.svg" alt="user" width="50" class="rounded-circle">
                                    <div class="media-body ml-3">
                                        <div class="bg-light rounded py-2 px-3 mb-2">
                                            <p class="text-small mb-0 text-muted">Test, which is a new approach to have</p>
                                        </div>
                                        <p class="small text-muted">12:00 PM | Aug 13</p>
                                    </div>
                                </div>

                                <!-- Reciever Message-->
                                <div class="w-100 d-flex justify-content-end">
                                    <div class="media w-50 ml-auto mb-3">
                                        <div class="media-body">
                                            <div class="bg-primary rounded py-2 px-3 mb-2">
                                                <p class="text-small mb-0 text-white">Test which is a new approach to have all MY MESSsolutions</p>
                                            </div>
                                            <p class="small text-muted">12:00 PM | Aug 13</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Sender Message-->
                                <div class="media w-50 mb-3"><img src="https://bootstrapious.com/i/snippets/sn-chat/avatar.svg" alt="user" width="50" class="rounded-circle">
                                    <div class="media-body ml-3">
                                        <div class="bg-light rounded py-2 px-3 mb-2">
                                            <p class="text-small mb-0 text-muted">Test, which is a new approach</p>
                                        </div>
                                        <p class="small text-muted">12:00 PM | Aug 13</p>
                                    </div>
                                </div>

                                <!-- Reciever Message-->
                                <div class="w-100 d-flex justify-content-end">
                                    <div class="media w-50 ml-auto mb-3">
                                        <div class="media-body">
                                            <div class="bg-primary rounded py-2 px-3 mb-2">
                                                <p class="text-small mb-0 text-white">Test which is a new approach to have all MY MESSsolutions</p>
                                            </div>
                                            <p class="small text-muted">12:00 PM | Aug 13</p>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <!-- Typing area -->
                            <form action="#" class="bg-light">
                                <div class="input-group">
                                    <input type="text" placeholder="Type a message" aria-describedby="button-addon2" class="form-control rounded-0 border-0 py-4 bg-light">
                                    <div class="input-group-append">
                                        <button id="button-addon2" type="submit" class="btn btn-link"> <i class="fa fa-paper-plane"></i></button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

            </div>
        </main>

        <div id="sidebar">
            <div class="sidebar__title">

                <div class="sidebar__img ">
                     
                    <h1 style="margin-right: 20px;">OnlineRent</h1>
                </div>
                <i onclick="closeSidebar()" class="fa fa-times" id="sidebarIcon" aria-hidden="true"></i>
            </div>

            <div class="sidebar__menu">
                <div class="sidebar__link active_menu_link">
                    <i class="fa fa-home"></i>
                    <a href="Dashboard.php">Dashboard</a>
                </div>
                <!-- <h2>MNG</h2> -->
                <div class="sidebar__link">
                    <i class="fa-solid fa-plus"></i>
                    <a href="PostAdd.php">Add Post</a>
                </div>
                <div class="sidebar__link">
                    <i class="fa fa-building-o"></i>
                    <a href="Posts.php">Posts</a>
                </div>

                <div class="sidebar__link">
                    <i class="fa-solid fa-users"></i>
                    <a href="Interested.php">Interested Users</a>
                </div>

                <h2>LEAVE</h2>

                <div class="sidebar__logout">
                    <i class="fa fa-power-off"></i>
                    <a href="#">Log out</a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="./js/script.js"></script>
</body>


</html>