
    $(document).ready(function () {
        //alert("ready......");
        /******[START-MENU DISABLE AND ENABLE]******* */
        $('.enable-disable-button-menu').on('click', function (e) {
            e.preventDefault();
            //alert("clicked......");           
            var menuId = $(this).data('menu-id');
           // alert("menu id : "+menuId);
            var method='POST';
            var url=baseUrl+"/menu/" + menuId + '/toggle';
            //alert(url);
           // url: '{{ url('/') }}/menu/' + menuId + '/toggle', // Use the url helper
            //alert(method +"url : "+url);
            $.ajax({
                type: method,
                url: url,
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'), // Include CSRF token                    
                },
                success: function (data) {
                    // Handle success, if needed
                    //console.log(data.status);
                    //console.log(data.message);
                    // You may want to update the UI or perform additional actions here
                    if (data.status === 'success' && data.redirect) {
                        // Redirect to the specified route                        
                        //alert(data.newStatus);
                        if(data.newStatus=='n')
                        {
                            alert('Menu Disabed  successfully.');
                        }
                        else
                        {
                            alert('Menu Enabled successfully.');
                        }
                        window.location.href = data.redirect;
                    }
                },
                error: function (error) {
                    // Handle errors, if needed
                    console.error('Error occurred: ' + error.responseText);
                    alert('Error occurred: ' + error.responseText)
                }
            });
        });
        /******[END-MENU DISABLE AND ENABLE]******* */
        /******[START-SUBMENU DISABLE AND ENABLE]******* */
        $('.enable-disable-button-submenu').on('click', function (e) {
            e.preventDefault();
            //alert("clicked......");           
            var submenuId = $(this).data('submenu-id');
           // alert("menu id : "+menuId);
            var method='POST';
            var url=baseUrl+"/submenu/" + submenuId + '/toggle';
            //alert(url);
           // url: '{{ url('/') }}/menu/' + menuId + '/toggle', // Use the url helper
            //alert(method +"url : "+url);
            $.ajax({
                type: method,
                url: url,
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'), // Include CSRF token                    
                },
                success: function (data) {
                    // Handle success, if needed
                    //console.log(data.status);
                    //console.log(data.message);
                    // You may want to update the UI or perform additional actions here
                    if (data.status === 'success' && data.redirect) {
                        // Redirect to the specified route                        
                        //alert(data.newStatus);
                        if(data.newStatus=='n')
                        {
                            alert('SubMenu Disabed  successfully.');
                        }
                        else
                        {
                            alert('SubMenu Enabled successfully.');
                        }
                        window.location.href = data.redirect;
                    }
                },
                error: function (error) {
                    // Handle errors, if needed
                    console.error('Error occurred: ' + error.responseText);
                    alert('Error occurred: ' + error.responseText)
                }
            });
        });
        /******[END-SUBMENU DISABLE AND ENABLE]******* */
         /******[START-SLIDER DISABLE AND ENABLE]******* */
         $('.enable-disable-button-slider').on('click', function (e) {
            e.preventDefault();
            //alert("clicked......");           
            var sliderId = $(this).data('slider-id');
           //alert("menu id : "+sliderId);
            var method='POST';
            var url= baseUrl+"/slider/" + sliderId + '/toggle';
           // alert(url);
           // url: '{{ url('/') }}/menu/' + menuId + '/toggle', // Use the url helper
            //alert(method +"url : "+url);
            $.ajax({
                type: method,
                url: url,
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'), // Include CSRF token                    
                },
                success: function (data) {
                    // Handle success, if needed
                    //console.log(data.status);
                    //console.log(data.message);
                    // You may want to update the UI or perform additional actions here
                    if (data.status === 'success' && data.redirect) {
                        // Redirect to the specified route                        
                        //alert(data.newStatus);
                        if(data.newStatus=='n')
                        {
                            alert('Slider Disabed  successfully.');
                        }
                        else
                        {
                            alert('Slider Enabled successfully.');
                        }
                        window.location.href = data.redirect;
                    }
                },
                error: function (error) {
                    // Handle errors, if needed
                    console.error('Error occurred: ' + error.responseText);
                    alert('Error occurred: ' + error.responseText)
                }
            });
        });
        /******[END-SLIDER DISABLE AND ENABLE]******* */
        /******[START-CROWLER DISABLE AND ENABLE]******* */
        $('.enable-disable-button-crowler').on('click', function (e) {
            e.preventDefault();
            //alert("clicked......");           
            var crowlerId = $(this).data('crowler-id');
           //alert("menu id : "+sliderId);
            var method='POST';
            var url= baseUrl+"/crowler/" + crowlerId + '/toggle';
           // alert(url);
           // url: '{{ url('/') }}/menu/' + menuId + '/toggle', // Use the url helper
            //alert(method +"url : "+url);
            $.ajax({
                type: method,
                url: url,
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'), // Include CSRF token                    
                },
                success: function (data) {
                    // Handle success, if needed
                    //console.log(data.status);
                    //console.log(data.message);
                    // You may want to update the UI or perform additional actions here
                    if (data.status === 'success' && data.redirect) {
                        // Redirect to the specified route                        
                        //alert(data.newStatus);
                        if(data.newStatus=='n')
                        {
                            alert('Crowler Disabed  successfully.');
                        }
                        else
                        {
                            alert('Crowler Enabled successfully.');
                        }
                        window.location.href = data.redirect;
                    }
                },
                error: function (error) {
                    // Handle errors, if needed
                    console.error('Error occurred: ' + error.responseText);
                    alert('Error occurred: ' + error.responseText)
                }
            });
        });
        /******[END-CROWLER DISABLE AND ENABLE]******* */

        // enable-disable-button-excellence-and-expertise
        /******[START-EXCELLENCE AND EXPERTISE DISABLE AND ENABLE]******* */
        $('.enable-disable-button-excellence-and-expertise').on('click', function (e) {
            e.preventDefault();
            //alert("clicked......");           
            var excellenceAndExpertiseId = $(this).data('excellenceandexpertise-id');
           //alert("excellenceAndExpertise Id : "+ excellenceAndExpertiseId);
            var method='POST';
            var url= baseUrl+"/excellenceAndExpertise/" + excellenceAndExpertiseId + '/toggle';
           //alert(url);
           // url: '{{ url('/') }}/menu/' + menuId + '/toggle', // Use the url helper
            //alert(method +"url : "+url);
            $.ajax({
                type: method,
                url: url,
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'), // Include CSRF token                    
                },
                success: function (data) {
                    // Handle success, if needed
                    //console.log(data.status);
                    //console.log(data.message);
                    // You may want to update the UI or perform additional actions here
                    if (data.status === 'success' && data.redirect) {
                        // Redirect to the specified route                        
                        //alert(data.newStatus);
                        if(data.newStatus=='n')
                        {
                            alert('Excellence And Expertise Disabed  successfully.');
                        }
                        else
                        {
                            alert('Excellence And Expertise Enabled successfully.');
                        }
                        window.location.href = data.redirect;
                    }
                },
                error: function (error) {
                    // Handle errors, if needed
                    console.error('Error occurred: ' + error.responseText);
                    alert('Error occurred: ' + error.responseText)
                }
            });
        });
        /******[END-EXCELLENCE AND EXPERTISE DISABLE AND ENABLE]******* */



        //enable-disable-button-settings
        /******[START-SETTINGS DISABLE AND ENABLE]******* */
        $('.enable-disable-button-settings').on('click', function (e) {
            e.preventDefault();
            //alert("clicked......");           
            var settingsId = $(this).data('settings-id');
           //alert("excellenceAndExpertise Id : "+ excellenceAndExpertiseId);
            var method='POST';
            var url= baseUrl+"/settings/" + settingsId + '/toggle';
           //alert(url);
           // url: '{{ url('/') }}/menu/' + menuId + '/toggle', // Use the url helper
            //alert(method +"url : "+url);
            $.ajax({
                type: method,
                url: url,
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'), // Include CSRF token                    
                },
                success: function (data) {
                    // Handle success, if needed
                    //console.log(data.status);
                    //console.log(data.message);
                    // You may want to update the UI or perform additional actions here
                    if (data.status === 'success' && data.redirect) {
                        // Redirect to the specified route                        
                        //alert(data.newStatus);
                        if(data.newStatus=='n')
                        {
                            alert('Settings Disabed  successfully.');
                        }
                        else
                        {
                            alert('Settings Enabled successfully.');
                        }
                        window.location.href = data.redirect;
                    }
                },
                error: function (error) {
                    // Handle errors, if needed
                    console.error('Error occurred: ' + error.responseText);
                    alert('Error occurred: ' + error.responseText)
                }
            });
        });
        /******[END-SETTINGS DISABLE AND ENABLE]******* */
        // enable-disable-button-award-and-recognition
        /******[START-AWARDS & RECOGNITION DISABLE AND ENABLE]******* */
        $('.enable-disable-button-award-and-recognition').on('click', function (e) {
            e.preventDefault();
            //alert("clicked......");           
            var awardsandrecognitionId = $(this).data('awardsandrecognition-id');
           //alert("awardsandrecognition Id : "+ awardsandrecognitionId);
            var method='POST';
            var url= baseUrl+"/awardsandrecognitions/" + awardsandrecognitionId + '/toggle';
           //alert(url);
           // url: '{{ url('/') }}/menu/' + menuId + '/toggle', // Use the url helper
            //alert(method +"url : "+url);
            $.ajax({
                type: method,
                url: url,
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'), // Include CSRF token                    
                },
                success: function (data) {
                    // Handle success, if needed
                    //console.log(data.status);
                    //console.log(data.message);
                    // You may want to update the UI or perform additional actions here
                    if (data.status === 'success' && data.redirect) {
                        // Redirect to the specified route                        
                        //alert(data.newStatus);
                        if(data.newStatus=='n')
                        {
                            alert('Awardsandrecognitions Disabed  successfully.');
                        }
                        else
                        {
                            alert('Awardsandrecognitions Enabled successfully.');
                        }
                        window.location.href = data.redirect;
                    }
                },
                error: function (error) {
                    // Handle errors, if needed
                    console.error('Error occurred: ' + error.responseText);
                    alert('Error occurred: ' + error.responseText)
                }
            });
        });
        /******[END-AWARDS & RECOGNITION DISABLE AND ENABLE]******* */

          // enable-disable-button-technology-we-work
         /******[START-TECHNOLOGY WE WORK DISABLE AND ENABLE]******* */
         $('.enable-disable-button-technology-we-work').on('click', function (e) {
            e.preventDefault();
            //alert("clicked......");           
            var technologyweworkId = $(this).data('technologywework-id');
           //alert("awardsandrecognition Id : "+ awardsandrecognitionId);
            var method='POST';
            var url= baseUrl+"/technologyweworks/" + technologyweworkId + '/toggle';
          // alert(url);
           // url: '{{ url('/') }}/menu/' + menuId + '/toggle', // Use the url helper
            //alert(method +"url : "+url);
            $.ajax({
                type: method,
                url: url,
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'), // Include CSRF token                    
                },
                success: function (data) {
                    // Handle success, if needed
                    //console.log(data.status);
                    //console.log(data.message);
                    // You may want to update the UI or perform additional actions here
                    if (data.status === 'success' && data.redirect) {
                        // Redirect to the specified route                        
                        //alert(data.newStatus);
                        if(data.newStatus=='n')
                        {
                            alert('Technologywework Disabed  successfully.');
                        }
                        else
                        {
                            alert('Technologywework Enabled successfully.');
                        }
                        window.location.href = data.redirect;
                    }
                },
                error: function (error) {
                    // Handle errors, if needed
                    console.error('Error occurred: ' + error.responseText);
                    alert('Error occurred: ' + error.responseText)
                }
            });
        });
        /******[END-TECHNOLOGY WE WORK DISABLE AND ENABLE]******* */
        
        
    });
