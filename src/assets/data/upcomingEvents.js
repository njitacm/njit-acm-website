let id = 4;
/*
    "date" or "dates" [...]
    "time" or "times" [...] (indices match the dates, if it's a multi-day event, split up)
*/
export default {
    "sp2025": [
        {
            "id": 0,
            "name": "(Shazam!) Buzzer Beater 3",
            "location": "GITC 3600",
            "date": "Thu, Feb 20",
            "time": "7-9 PM",
            "image": "sp2025/BuzzerBeater3.png",
            "desc": "Come enjoy a fun night of guessing song titles before your opponent in a tournament style! Do you have what it takes to win?",
        },
        {
            "id": 1,
            "name": "Design Jam",
            "location": "Campus Center Atrium",
            "dates": ["Sat, Mar 8", "Sun, Mar 9"],
            "times": ["9 AM - 7:30 PM", "9 AM - 1 PM"],
            "image": "sp2025/DesignJam.png",
            "desc": "In collaboration with us at ACM, WiCS, and YWCC, SIGCHI is hosting their annual design jam this weekend! Participate in the beginner-friendly UX hackathon-style event in teams of 1 to 4 to create an interactive prototype that showcases solving a real user problem. This is a great opportunity to gain design experience and collaborate with others to create meaningful designs and solutions. Judging will be based on the design thinking process and the visual/interactive component. Prizes will be distributed for 1st, 2nd, and 3rd place and every participant will be entered in a raffle for a prize!",
            "links": {
                "Register Here": "https://forms.gle/tnQbDrR1fyFdvxCb9",
            }
        },
        {
            "id": 2,
            "name": "Jersey CTF V",
            "location": "Naimoli Tennis Center, NJIT",
            "dates": ["Sat, Mar 29", "Sun, Mar 30"],
            "times": [{ "start": "10 AM" }, { "end": "3:30 PM" }],
            "delimiter": " - ",
            "image": "sp2025/JCTFV_FullFlyer.png",
            "desc": "",
            "links": {
                "More Information": "https://www.jerseyctf.com/",
            }
        },
        {
            "id": 3,
            "name": "Speed Networking",
            "location": "Campus Center Ballroom A",
            "date": "Mon, Apr 21",
            "time": "5 PM - 7 PM",
            "image": "sp2025/SpeedNetworking.png",
            "desc": "Drop by and meet people! Here, you will get to program your own NFC tag to make exchanging contacts as quick as a flash. Expand your network and mingle at this speed networking event! There will be free food and a photobooth to take pictures with your new pals.",
            "links": {
                "RSVP Now": { "id": 0, "link": "https://njit.campuslabs.com/engage/event/11264412" },
                "Add to Calendar": { "id": 1, "link": "https://njit.campuslabs.com/engage/event/11264412/googlepublish" }
            }
        }
    ],
    "fa2025": [
        {
            "id": id++,
            "name": "Spooky CTF",
            "location": "GITC 3700",
            "date": "Fri, Oct 31",
            "time": "11:30 AM - 1 PM",
            "image": "",
            "desc": "",
            "links": {
                
            }
        },
        {
            "id": id++,
            "name": "ALU Workshop",
            "location": "GITC 3700",
            "date": "Wed, Nov 5",
            "time": "11:30 AM - 1 PM",
            "image": "",
            "desc": "",
            "links": {
                
            }
        },
        {
            "id": id++,
            "name": "YWCC Registration",
            "location": "GITC 3700",
            "date": "Fri, Nov 7",
            "time": "11:30 AM - 1 PM",
            "image": "",
            "desc": "",
            "links": {
                
            }
        },
        {
            "id": id++,
            "name": "Speed Networking",
            "location": "CC Atrium",
            "date": "Mon, Nov 10",
            "time": "7 - 8 PM",
            "image": "",
            "desc": "Take this opportunity to expand your network! Program your own NFC tag and mingle with your peers.",
            "links": {
                
            }
        },
        {
            "id": id++,
            "name": "Create your own Discord Bot",
            "location": "",
            "date": "Wed, Nov 12",
            "time": "2:30 - 4 PM",
            "image": "",
            "desc": "",
            "links": {
                
            }
        },
        {
            "id": id++,
            "name": "ACM Election",
            "location": "GITC 3700",
            "date": "Fri, Nov 14",
            "time": "11:30 AM - 1 PM",
            "image": "",
            "desc": "",
            "links": {
                
            }
        },
        {
            "id": id++,
            "name": "Pathfinding Workshop",
            "location": "",
            "date": "Wed, Nov 19",
            "time": "1 - 2 PM",
            "image": "",
            "desc": "",
            "links": {
                
            }
        },
        {
            "id": id++,
            "name": "GitHub Season of AI: MCP",
            "location": "GITC 3700",
            "date": "Fri, Nov 21",
            "time": "11:30 AM - 1 PM",
            "image": "",
            "desc": "",
            "links": {
                
            }
        },
        {
            "id": id++,
            "name": "Parallel Processing Workshop",
            "location": "",
            "date": "Tue, Nov 25",
            "time": "4 - 5 PM",
            "image": "",
            "desc": "",
            "links": {
                
            }
        },
        {
            "id": id++,
            "name": "Battlesnake Series: Intro to Web Dev (#1)",
            "location": "",
            "date": "Mon, Dec 1",
            "time": "6 - 7 PM",
            "image": "",
            "desc": "",
            "links": {
                
            }
        },
        {
            "id": id++,
            "name": "Battlesnake Series: Intro to Web Dev (#2)",
            "location": "",
            "date": "Wed, Dec 3",
            "time": "2:30 - 4 PM",
            "image": "",
            "desc": "",
            "links": {
                
            }
        },
        {
            "id": id++,
            "name": "Battlesnake Series: Battlesnake",
            "location": "GITC 3700",
            "date": "Fri, Dec 5",
            "time": "11:30 AM - 1 PM",
            "image": "",
            "desc": "",
            "links": {
                
            }
        },
        {
            "id": id++,
            "name": "Build your own Joycon",
            "location": "",
            "date": "Fri, Dec 5",
            "time": "6 - 7 PM",
            "image": "",
            "desc": "",
            "links": {
                
            }
        },
    ]
};