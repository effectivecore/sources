<?php

namespace effcore;

###################
### manual test ###
###################

Response::send_header_and_exit('access_forbidden', 'custom_title'                                          );
Response::send_header_and_exit('access_forbidden', null                                                    );
Response::send_header_and_exit('access_forbidden', new Text_multiline([1,2,3])                             );
Response::send_header_and_exit('access_forbidden', 'custom_title'             , null                       );
Response::send_header_and_exit('access_forbidden', 'custom_title'             , 'custom_message'           );
Response::send_header_and_exit('access_forbidden', 'custom_title'             , new Text_multiline([4,5,6]));
Response::send_header_and_exit('access_forbidden', null                       , null                       );
Response::send_header_and_exit('access_forbidden', null                       , 'custom_message'           );
Response::send_header_and_exit('access_forbidden', null                       , new Text_multiline([4,5,6]));
Response::send_header_and_exit('access_forbidden', new Text_multiline([1,2,3]), null                       );
Response::send_header_and_exit('access_forbidden', new Text_multiline([1,2,3]), 'custom_message'           );
Response::send_header_and_exit('access_forbidden', new Text_multiline([1,2,3]), new Text_multiline([4,5,6]));

Response::send_header_and_exit('page_not_found', 'custom_title'                                          );
Response::send_header_and_exit('page_not_found', null                                                    );
Response::send_header_and_exit('page_not_found', new Text_multiline([1,2,3])                             );
Response::send_header_and_exit('page_not_found', 'custom_title'             , null                       );
Response::send_header_and_exit('page_not_found', 'custom_title'             , 'custom_message'           );
Response::send_header_and_exit('page_not_found', 'custom_title'             , new Text_multiline([4,5,6]));
Response::send_header_and_exit('page_not_found', null                       , null                       );
Response::send_header_and_exit('page_not_found', null                       , 'custom_message'           );
Response::send_header_and_exit('page_not_found', null                       , new Text_multiline([4,5,6]));
Response::send_header_and_exit('page_not_found', new Text_multiline([1,2,3]), null                       );
Response::send_header_and_exit('page_not_found', new Text_multiline([1,2,3]), 'custom_message'           );
Response::send_header_and_exit('page_not_found', new Text_multiline([1,2,3]), new Text_multiline([4,5,6]));

Response::send_header_and_exit('file_not_found', 'custom_title'                                          );
Response::send_header_and_exit('file_not_found', null                                                    );
Response::send_header_and_exit('file_not_found', new Text_multiline([1,2,3])                             );
Response::send_header_and_exit('file_not_found', 'custom_title'             , null                       );
Response::send_header_and_exit('file_not_found', 'custom_title'             , 'custom_message'           );
Response::send_header_and_exit('file_not_found', 'custom_title'             , new Text_multiline([4,5,6]));
Response::send_header_and_exit('file_not_found', null                       , null                       );
Response::send_header_and_exit('file_not_found', null                       , 'custom_message'           );
Response::send_header_and_exit('file_not_found', null                       , new Text_multiline([4,5,6]));
Response::send_header_and_exit('file_not_found', new Text_multiline([1,2,3]), null                       );
Response::send_header_and_exit('file_not_found', new Text_multiline([1,2,3]), 'custom_message'           );
Response::send_header_and_exit('file_not_found', new Text_multiline([1,2,3]), new Text_multiline([4,5,6]));

