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
            "times": [{"start": "10 AM"}, {"end": "3:30 PM"}],
            "delimiter": " - ",
            "image": "sp2025/JCTFV.png",
            "desc": "",
            "links": {
                "More Information": "https://www.jerseyctf.com/",
            }
        }
    ]
};