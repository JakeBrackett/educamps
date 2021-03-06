create table account(
    uuid binary(16) NOT NULL, 
    fname varchar(100), 
    lname varchar(200), 
    email varchar(200), 
    phone varchar(15), 
    password varchar(125) NOT NULL, 
    PRIMARY KEY(uuid)
);

create table child(
    childid int NOT NULL AUTO_INCREMENT, 
    uuid binary(16) NOT NULL, 
    childname varchar(400), 
    dob date, 
    other varchar(1000), 
    PRIMARY KEY (childid), 
    FOREIGN KEY (uuid) REFERENCES account(uuid)
);


create table camplocation(
    camplocid int NOT NULL AUTO_INCREMENT, 
    camplocname varchar(400),  
    campdirector varchar(200), 
    campaddr varchar(300), 
    campofficeloc varchar(300), 
    PRIMARY KEY (camplocid)
);

create table camps(
    campid int NOT NULL AUTO_INCREMENT, 
    camplocid int NOT NULL, 
    campname varchar(400), 
    startdate date, 
    enddate date, 
    campcost numeric(14,2), 
    enrolled int, 
    campcapacity int, 
    PRIMARY KEY (campid), 
    FOREIGN KEY (camplocid) references camps(campid)
);


create table items(
    itemid int NOT NULL AUTO_INCREMENT,
    imgsrc varchar(300),
    description varchar(1000),
    price numeric(14, 2),
    itemtype char, 
    PRIMARY KEY (itemid)
);

create table stock( 
    stockid int NOT NULL AUTO_INCREMENT,
    size varchar(2),
    instock int,
    itemid int NOT NULL,
    PRIMARY KEY (stockid,
    FOREIGN KEY (itemid) references items(itemid)
);

create table orders(
    orderid int NOT NULL AUTO_INCREMENT,
    uuid binary(16) NOT NULL, 
    orderdate date, 
    completed binary(1), 
    PRIMARY KEY (orderid),
    FOREIGN KEY (uuid) REFERENCES account(uuid)
);

create table order_item(
    orderid int NOT NULL, 
    itemid int NOT NULL, 
    ordertotal int, 
    discountpercent int, 
    FOREIGN KEY (orderid) references orders(orderid), 
    FOREIGN KEY (itemid) references items(itemid)
);

create table forumposts(
    postid int NOT NULL AUTO_INCREMENT,
    account binary(16) NOT NULL,
    ftext varchar(9000), 
    postdate datetime, 
    isReply binary(1), 
    PRIMARY KEY (postid), 
    FOREIGN KEY (account) references account(uuid)
);

create table activity(
    activityid int NOT NULL AUTO_INCREMENT, 
    activityname varchar(300), 
    PRIMARY KEY (activityid)
);  

create table camp_activity(
    activityid int NOT NULL,
    campid int NOT NULL, 
    FOREIGN KEY (activityid) references activity(activityid),
    FOREIGN KEY (campid) references camps(campid)
);

create table session_enrollment(
    sessionenrollid int NOT NULL AUTO_INCREMENT, 
    sessiontimestamp datetime, 
    enrollpaid numeric(14,2), 
    childid int NOT NULL, 
    account binary(16) NOT NULL, 
    activity int NOT NULL, 
    campid int NOT NULL, 
    PRIMARY KEY (sessionenrollid), 
    FOREIGN KEY(childid) references child(childid), 
    FOREIGN KEY(account) references account(uuid), 
    FOREIGN KEY (activity) references activity(activityid), 
    FOREIGN KEY (campid) references camps(campid)
);

create table memories(
    memoryid int NOT NULL AUTO_INCREMENT,
    account binary(16), 
    description varchar(1000), 
    filename varchar(600),
    PRIMARY KEY(memoryid), 
    FOREIGN KEY(account) references account(uuid)
);