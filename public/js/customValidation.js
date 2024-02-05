
$(document).ready(function () {
    //console.log( "ready!" );
    /*****************START-LOGIN FORM VALIDATION******************************************* */
    $("#loginForm").validate({
        rules: {
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 5
            }
        },
        messages: {
            email: "Please enter a valid email address",
            password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 5 characters long"
            }
        }
    });
    /*****************END-LOGIN FORM VALIDATION******************************************* */
    /*****************START-ADD MENU FORM VALIDATION******************************************* */
    $("#addMenuForm").validate({
        rules: {
            title: {
                required: true,
            },
            link: {
                required: true,
            }
        },
        messages: {
            title: "Title is required",
            link: "Link is required",

        }
    });
    /*****************END-ADD MENU FORM VALIDATION******************************************* */
    /*****************START-ADD MENU FORM VALIDATION******************************************* */
    $("#editMenuForm").validate({
        rules: {
            title: {
                required: true,
            },
            link: {
                required: true,
            }
        },
        messages: {
            title: "Title is required",
            link: "Link is required",
        }
    });
    /*****************END-ADD MENU FORM VALIDATION******************************************* */
    /*****************START-ADD SUBMENU FORM VALIDATION******************************************* */
    $("#addSubMenuForm").validate({
        rules: {
            parentMenu: {
                required: true,
            },
            title: {
                required: true,
            },
            link: {
                required: true,
            }
        },
        messages: {
            parentMenu: "Menu is required",
            title: "Title is required",
            link: "Link is required",
        }
    });
    /*****************END-ADD SUBMENU FORM VALIDATION******************************************* */
    /***************** START-EDIT SUBMENU FORM VALIDATION ******************************************* */
    $("#editSubMenuForm").validate({
        rules: {
            parentMenu: {
                required: true,
            },
            title: {
                required: true,
            },
            link: {
                required: true,
            }
        },
        messages: {
            parentMenu: "Menu is required",
            title: "Title is required",
            link: "Link is required",
        }
    });
    /***************** END-EDIT SUBMENU FORM VALIDATION ******************************************* */

    /***************** START-ADD SLIDER VALIDATION ******************************************* */
    $("#addSliderForm").validate({
        rules: {
            firstTitle: {
                required: true,
            },
            secondTitle: {
                required: true,
            },
            image: {
                required: true,
                accept: "image/jpeg, image/jpg, image/png", // Accept only specific image file extensions                    
            }
        },
        messages: {
            firstTitle: "Title is required",
            secondTitle: "Title is required",
            image: {
                required: "Image is required",
                accept: "Please upload a valid image file with extension .jpg, .jpeg, or .png",
            }
        }
    });
    /***************** END-ADD SLIDER VALIDATION ******************************************* */
    /***************** START-EDIT SLIDER VALIDATION ******************************************* */
    $("#editSliderForm").validate({
        rules: {
            firstTitle: {
                required: true,
            },
            secondTitle: {
                required: true,
            },
            image: {
                required: false,
                accept: "image/jpeg, image/jpg, image/png", // Accept only specific image file extensions                    
            }
        },
        messages: {
            firstTitle: "Title is required",
            secondTitle: "Title is required",
            image: {
                required: "Image is required",
                accept: "Please upload a valid image file with extension .jpg, .jpeg, or .png",
            }
        }
    });
    /***************** END-EDIT SLIDER VALIDATION ******************************************* */
    /***************** START-CROWLER VALIDATION ******************************************* */
    $("#addCrowlerForm").validate({
        rules: {
            title: {
                required: true,
            },
            content: {
                required: true,
            },
            url: {
                required: true,
            },
            image: {
                required: true,
                accept: "image/jpeg, image/jpg, image/png", // Accept only specific image file extensions                    
            }
        },
        messages: {
            title: "Title is required",
            content: "Title is required",
            url: "URL is required",
            image: {
                required: "Image is required",
                accept: "Please upload a valid image file with extension .jpg, .jpeg, or .png",
            }
        }
    });
    /***************** END-CROWLER VALIDATION ******************************************* */
    /***************** START-EDIT CROWLER VALIDATION ******************************************* */
    $("#editCrowlerForm").validate({
        rules: {
            title: {
                required: true,
            },
            content: {
                required: true,
            },
            url: {
                required: true,
            },
            image: {
                required: false,
                accept: "image/jpeg, image/jpg, image/png", // Accept only specific image file extensions                    
            }
        },
        messages: {
            title: "Title is required",
            content: "Title is required",
            url: "URL is required",
            image: {
                required: "Image is required",
                accept: "Please upload a valid image file with extension .jpg, .jpeg, or .png",
            }
        }
    });
    /***************** END-EDIT CROWLER VALIDATION ******************************************* */
    /***************** START-EXCELLENCE AND EXPERTISE VALIDATION ******************************************* */
    $("#addExcellenceAndExpertiseForm").validate({
        rules: {
            title: {
                required: true,
            },
            description: {
                required: true,
            },
            tabTopTitle: {
                required: true,
            },
            tabRightTitle: {
                required: true,
            },
            tabBottomTitle: {
                required: true,
            },
            tabLeftTitle: {
                required: true,
            },
            image: {
                required: true,
                accept: "image/jpeg, image/jpg, image/png", // Accept only specific image file extensions                    
            }
        },
        messages: {
            title: "Title is required",
            description: "Description is required",
            tabTopTitle: "Title is required",
            tabRightTitle: "Title is required",
            tabBottomTitle: "Title is required",
            tabLeftTitle: "Title is required",
            image: {
                required: "Image is required",
                accept: "Please upload a valid image file with extension .jpg, .jpeg, or .png",
            }
        }
    });
    /***************** END-EXCELLENCE AND EXPERTISE VALIDATION ******************************************* */
    /***************** START-EDIT EXCELLENCE AND EXPERTISE VALIDATION ******************************************* */
    $("#editExcellenceAndExpertiseForm").validate({
        rules: {
            title: {
                required: true,
            },
            description: {
                required: true,
            },
            tabTopTitle: {
                required: true,
            },
            tabRightTitle: {
                required: true,
            },
            tabBottomTitle: {
                required: true,
            },
            tabLeftTitle: {
                required: true,
            },
            image: {
                required: false,
                accept: "image/jpeg, image/jpg, image/png", // Accept only specific image file extensions                    
            }
        },
        messages: {
            title: "Title is required",
            description: "Description is required",
            tabTopTitle: "Title is required",
            tabRightTitle: "Title is required",
            tabBottomTitle: "Title is required",
            tabLeftTitle: "Title is required",
            image: {
                required: "Image is required",
                accept: "Please upload a valid image file with extension .jpg, .jpeg, or .png",
            }
        }
    });
    /***************** END-EDIT EXCELLENCE AND EXPERTISE VALIDATION ******************************************* */
    /***************** START-SETTING VALIDATION ******************************************* */
    $("#addSettingForm").validate({
        rules: {
            contactInfo: {
                required: true,
            },
            emailId: {
                required: true,
            },
            image: {
                required: false,
                accept: "image/jpeg, image/jpg, image/png", // Accept only specific image file extensions                    
            }
        },
        messages: {
            contactInfo: "Contact is required",
            emailId: "Email is required",
            image: {
                required: "Image is required",
                accept: "Please upload a valid image file with extension .jpg, .jpeg, or .png",
            }
        }
    });
    /***************** END-SETTING VALIDATION ******************************************* */
    /***************** START-SETTING VALIDATION ******************************************* */
    $("#editSettingForm").validate({
        rules: {
            contactInfo: {
                required: true,
            },
            emailId: {
                required: true,
            },
            image: {
                required: false,
                accept: "image/jpeg, image/jpg, image/png", // Accept only specific image file extensions                    
            }
        },
        messages: {
            contactInfo: "Contact is required",
            emailId: "Email is required",
            image: {
                required: "Image is required",
                accept: "Please upload a valid image file with extension .jpg, .jpeg, or .png",
            }
        }
    });
    /***************** END-SETTING VALIDATION ******************************************* */
    /***************** START-AWARDS & RECOGNITION VALIDATION ******************************************* */
    $("#addAwardsAndRecognitionForm").validate({
        rules: {
            title: {
                required: true,
            },
            description: {
                required: true,
            },
            image: {
                required: true,
                accept: "image/jpeg, image/jpg, image/png", // Accept only specific image file extensions                    
            }
        },
        messages: {
            title: "Title is required",
            description: "Description is required",
            image: {
                required: "Image is required",
                accept: "Please upload a valid image file with extension .jpg, .jpeg, or .png",
            }
        }
    });
    /***************** END-AWARDS & RECOGNITION VALIDATION ******************************************* */
    /***************** START-AWARDS & RECOGNITION VALIDATION ******************************************* */
    $("#editAwardsAndRecognitionForm").validate({
        rules: {
            title: {
                required: true,
            },
            description: {
                required: true,
            },
            image: {
                required: false,
                accept: "image/jpeg, image/jpg, image/png", // Accept only specific image file extensions                    
            }
        },
        messages: {
            title: "Title is required",
            description: "Description is required",
            image: {
                //required: "Image is required",
                accept: "Please upload a valid image file with extension .jpg, .jpeg, or .png",
            }
        }
    });
    /***************** END-AWARDS & RECOGNITION VALIDATION ******************************************* */

    // addTechnologyWeWorkForm
    /***************** START-TECHNOLOGY WE WORK VALIDATION ******************************************* */
    $("#addTechnologyWeWorkForm").validate({
        rules: {
            title: {
                required: true,
            },
            description: {
                required: true,
            },
            image: {
                required: true,
                accept: "image/jpeg, image/jpg, image/png", // Accept only specific image file extensions                    
            }
        },
        messages: {
            title: "Title is required",
            description: "Description is required",
            image: {
                required: "Image is required",
                accept: "Please upload a valid image file with extension .jpg, .jpeg, or .png",
            }
        }
    });
    /***************** END-TECHNOLOGY WE WORK VALIDATION ******************************************* */
    // editTechnologyWeWorkForm
    /***************** START-TECHNOLOGY WE WORK VALIDATION ******************************************* */
    $("#editTechnologyWeWorkForm").validate({
        rules: {
            title: {
                required: true,
            },
            description: {
                required: true,
            },
            image: {
                required: false,
                accept: "image/jpeg, image/jpg, image/png", // Accept only specific image file extensions                    
            }
        },
        messages: {
            title: "Title is required",
            description: "Description is required",
            image: {
                //required: "Image is required",
                accept: "Please upload a valid image file with extension .jpg, .jpeg, or .png",
            }
        }
    });
    /***************** END-TECHNOLOGY WE WORK VALIDATION ******************************************* */


});//End ready function
