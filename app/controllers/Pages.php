<?php

class Pages extends Controller {


    public function __construct() {

        if(isLoggedIn()) {
            redirect('admin/index');
        }

    }

    public function index() {
        
        $data = [
            'title' => 'Welcome',
        
        ];

        $this->view("pages/index", $data);

    }

    public function services() {

        $data = [
            "header"          => "If you need to get your idea of the ground - such as creating a business plan, understanding your target market or building a complete web application or just a prototype,  ",
            "bold"            => "I can help you.",
            "link"            => "To learn how, click here!",     
            "brochureWebsite" => "A brochure site is a simple site used for presentation, conveying the message you aim to get across to your audience. The important thing is to make sure your page stands-out from the rest with great graphics & design.",
            "appUi"           => "A well designed and beautiful App UI (user interface) is today almost key in order for any audience to quickly adopt a new product. I'll help you get the interface just right and make the navigation within the app a breeze.",
            "protoType"       => "Your business might have an idea for a new web or mobile app and need assistance in actually building it. If so, I can help you get started with a functional prototype or fully developed product. It all depends on your needs and where you are in your product development journey.",
            "corpDesign"      => "A strong brand is recognizable and meaningful to its audience. I can help you build a strong graphical identity from gorund-up or refresh your current one covering your business cards, website, physical brochures, mail blasts and more.",
            "businessModel"   => "Perhaps you already have a business or just getting started with your startup but need guidance in figuring out key issues like; ",
            "businessModelList" => "What your value proposition will be to your customers?
                                    Who your target partners are? What the main activities of your business will be? 
                                    How you'll handle customer relationships? 
                                    Figuring out who's your most important customer? Identifying strategic resources within your company? 
                                    Figuring out sales channels, identifying costs or understanding your main revenue streams. 
                                    If so, then get in touch and we'll talk.",
            "marketResearch"            => "To stay ahead in your industry you'll need market information. With my experience in relevant news gatherinig and market research for multi national corporations, I'll make sure you have a steady stream of market insights to make sure you're always up to date.",
            "trendAnalysis"             => "Sometimes people get stuck, so do businesses. To get unstuck you'll need to better understand where your and other markets of relevance are going. Given my background in consulting I can provide a deep dive into new fields to help you better spot new opportunities",
            "marketingPr"               => "You've come to the point where you're ready to launch your new app, website or other product, then let's make sure that it gets a successful start. I'll help you conceptualize & execute your product launch activities."


        
        ];

        $this->view("pages/services", $data);

    }

    public function process() {

        $data = [
            "header"      => "Here I'll go through the design & development process in general.",
            "subHeader"   => "Of course, depending on where you are in your project, it might look different. Though it all starts with a ",
            "link"        => "chat.",
            "meet"        => "We start by meeting at a cafe, office or just through skype depending on where we are the time. The purpose is to get to know each other and what our thoughts and expectations are.",
            "brief"       => "After our chat, I'll return to you with a project summary documentation which walks you through the scope, timeline, technologies required, respnsibilities and remuneration of the project. Once it suits us both, we'll start.",
            "wireFrame"   => "This stage is very important, and is the first step for us to really get a feel for your new project. This is the stage where I'll prepare so called wireframes, blueprints, of your project. After some iteration, when we both have a clear understanding of the fundamental structure, layout and design of the site we're ready to jump to the next phase.",
            "design"      => "At this stage you're finally going to see a functioning site, though not all of it. The purpose of this stage is to present a home page or main page design of your project. Basically the 1-2 most important pages of the project will be designed and showcased on 1-2 different platforms such as general mobile and desktop screens. When we have a mutual understanding of your requests, I'll continue with the remaining pages.",
            "development" => "This is the stage which will take the longest, and will be the most silent. This is where I basically go back to my desk and complete the rest of your project, until it's basically finished. We'll have 1-2 check-points along the way. ",
            "training"    => "After some silence, since there is not too much to give feedback on in previous stage, we meet again, though this time we're really close to the finish line. This is the stage where we go through the site, all its functionalities, how it is used & maintained. If needed I can also provide training for off-site team members and provide with a short \"users manual\".",
            "launch"      => "It's finished! This is the stage where it's time to launch the project and finally give over the steering wheel. Here I'll hand over all usernames & passwords to maintain the project. It's also recommended that the project goes live for about 1 week before any heavy marketing is started, just to see that everything is working as it should."

        ];

        $this->view("pages/process", $data);

    }

    public function contact() {

        $data = [
            "maps" => "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6017.760475181866!2d28.996427119573962!3d41.049748025526384!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14cab70977e134e9%3A0x3c6d2b5bf299e3de!2zVGXFn3Zpa2l5ZSwgQXYuIFPDvHJleXlhIEHEn2FvxJ9sdSBTay4gTm86MjYsIDM0MzY1IMWeacWfbGkvxLBzdGFuYnVs!5e0!3m2!1ssv!2str!4v1547665397105\" frameborder=\"0\" style=\"border:0\" allowfullscreen class=\"contact-container__maps",
            
        ];

        $this->view("pages/contact", $data);

    }

    public function about($id = null) {
        $data = [
            'title'                 => 'About Us',
            'headtitle'             => "Since you're here, I take it you're looking for a developer?",
            'subtitle'              => "If so, I can help you with your next project.",
            'contentone'            => "I can help you design, build and operate your next web application.
                                        Depending on your needs I can also assist with developing your business model.",
            'question'              => "Have a project you'd like to dicsuss? ",
            'letstalk'              => "Let's talk!",
            'contenttwo'            => "I understand that you're looking for the best bang for the buck, especially considering this might be a remote project.
                                        That's why I have listed a couple of capabilities of mine and principles which are important to me.",
            'clicktoread'           => "Click to read more about my capabilities & principles.",
            'clearcommunication'    => "The goals and objectives of each project are clearly defined, written & mutually signed. Each project starts with a kick-off to walk through any questions that need clarification.",
            'timemanagement'        => "I value my clients’ time and always aim to work efficiently. I track & report everything I do for my clients review when asked for.",
            'projectmanagement'     => "With an experience in business consulting and account management working with various industries, I understand the importance of structuring any project into deliverable smaller tasks and know how to follow up on them.",
            'documentation'         => "The importance of documentation should not be underestimated. Each project is documented from proposal to delivery to give a clear picture for any future project and to third parties.",
            'collaboration'         => "My aim as a consultant & developer is to make sure your project reaches its goals. As such, I understand the importance of being able to get along and work as a team.",
            'structure'             => "People would describe me as organized and tidy. Have always kept my keys in the same left pocket.",
            'languages'             => ['PHP', 'Javascript', 'Git & Github', 'SASS', 'React', 'CSS & HTML 5', 'Responsiv Design', 'SQL', 'Wordpress', 'Excel & Powerpoint']

        ];

        $this->view("pages/about", $data);
        
    }
}


?>