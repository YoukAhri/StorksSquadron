const pilots = [
  {
    nick: "Псих", // Ник игрока 
    name: "Илья", // Имя игрока
    number: "113", // Номер игрока
    avatar: "../Picture/pilots/113.png", // путь для пикчи ( менять только название и формат)
    joinDate: "28 марта 2024", // дата вступления
    rank: "Squadron Leader", // должность
    planes: ["F/A-18C Lot 20", "C-130J-30", "F4U-1D"], // до 3х самолётов
    role: "Универсал", // Роль игрока
    flag: "../Picture/pilots/ru_flag.png" // флаг региона, менять аналогично только название файла
  },

  {
    nick: "SFSR",
    name: "Александр",
    number: "233",
    avatar: "../Picture/pilots/233.png",
    joinDate: "27 мая 2024",
    rank: "Flight Leader",
    planes: ["F/A-18C Lot 20", "AH-64D"],
    role: "Универсал",
    flag: "../Picture/pilots/ru_flag.png"
  },

  {
    nick: "Esol",
    name: "Владислав",
    number: "268",
    avatar: "../Picture/pilots/268.png",
    joinDate: "28 марта 2024",
    rank: "Squadron Leader",
    planes: ["F/A-18C Lot 20", "F4U-1D", "UH-1H Huey"],
    role: "Универсал",
    flag: "../Picture/pilots/ru_flag.png"
  },

  {
    nick: "Shatunez",
    name: "Александр",
    number: "451",
    avatar: "../Picture/pilots/451.png",
    joinDate: "5 ноября 2024",
    rank: "Senior Pilot",
    planes: ["F-16C", "F/A-18C Lot 20"],
    role: "Универсал",
    flag: "../Picture/pilots/ru_flag.png"
  },

  {
    nick: "Sonse",
    name: "Арсений",
    number: "71",
    avatar: "../Picture/pilots/71.png",
    joinDate: "8 мая 2024",
    rank: "Pilot",
    planes: ["F-16C", "AV-8B Night Attack V/STOL"],
    role: "Штурмовик - Истребитель",
    flag: "../Picture/pilots/ru_flag.png"
  },

  {
    nick: "Goldie",
    name: "Давид",
    number: "52",
    avatar: "../Picture/pilots/52.png",
    joinDate: "19 апреля 2024",
    rank: "Senior Pilot",
    planes: ["F-16C", "A-10C II", "AH-64D Apache"],
    role: "Универсал",
    flag: "../Picture/pilots/ba_flag.png"
  },

  {
    nick: "Costo",
    name: "Борис",
    number: "17",
    avatar: "../Picture/pilots/17.png",
    joinDate: "1 июня 2024",
    rank: "Pilot",
    planes: ["F/A-18C Lot 20"],
    role: "Штурмовик",
    flag: "../Picture/pilots/ru_flag.png"
  },

  {
    nick: "mrKot",
    name: "Виталий",
    number: "105",
    avatar: "../Picture/pilots/105.png",
    joinDate: "5 июля 2024",
    rank: "Cadet",
    planes: ["Ка-50 III"],
    role: "Штурмовик",
    flag: "../Picture/pilots/ru_flag.png"
  },

  {
    nick: "Fubor",
    name: "Тамерлан",
    number: "666",
    avatar: "../Picture/pilots/666.png",
    joinDate: "1 Октября 2024",
    rank: "Senior Pilot",
    planes: ["Ka-50 III", "Mi-8MTV2"],
    role: "Вертолетчик",
    flag: "../Picture/pilots/ru_flag.png"
  },

  {
    nick: "Fo4nine",
    name: "Исмаэль",
    number: "406",
    avatar: "../Picture/pilots/406.png",
    joinDate: "6 июня 2024",
    rank: "Pilot",
    planes: ["F/A-18C Lot 20"],
    role: "Штурмовик",
    flag: "../Picture/pilots/kz_flag.png"
  },

  {
    nick: "Сварог",
    name: "Александр",
    number: "144",
    avatar: "../Picture/pilots/Dis.png",
    joinDate: "1 января 2024",
    rank: "Pilot",
    planes: ["F/A-18C Lot 20", "F-16C"],
    role: "Штурмовик",
    flag: "../Picture/pilots/ru_flag.png"
  },

  {
    nick: "ЕНОТ",
    name: "Тимофей",
    number: "153",
    avatar: "../Picture/pilots/153.png",
    joinDate: "10 ноября 2024",
    rank: "Pilot",
    planes: ["F/A-18C Lot 20", "F-16C"],
    role: "Штурмовик - Истребитель",
    flag: "../Picture/pilots/ru_flag.png"
  },

  {
    nick: "Сонар",
    name: "Дмитрий",
    number: "310",
    avatar: "../Picture/pilots/310.png",
    joinDate: "27 октября 2024",
    rank: "Pilot",
    planes: ["F/A-18C Lot 20", "AH-64D Apache"],
    role: "Универсал",
    flag: "../Picture/pilots/ru_flag.png"
  },
  
  {
    nick: "гусЬ",
    name: "Игорь",
    number: "754",
    avatar: "../Picture/pilots/754.png",
    joinDate: "28 марта 2024",
    rank: "Pilot",
    planes: ["F-16C", "Ka-50 III"],
    role: "Универсал",
    flag: "../Picture/pilots/ru_flag.png"
  },
  
  {
    nick: "Crim",
    name: "Александр",
    number: "985",
    avatar: "../Picture/pilots/985.png",
    joinDate: "20 апреля 2024",
    rank: "Flight Leader",
    planes: ["F/A-18C Lot 20", "Ka-50 III"],
    role: "Универсал",
    flag: "../Picture/pilots/ru_flag.png"
  },
    
  {
    nick: "kraсoz",
    name: "Михаил",
    number: "103",
    avatar: "../Picture/pilots/103.png",
    joinDate: "25 мая 2024",
    rank: "Pilot",
    planes: ["Миг-29А 9-12", "Су-25"],
    role: "Штурмовик",
    flag: "../Picture/pilots/ru_flag.png"
  },
      
  {
    nick: "Oiru",
    name: "---",
    number: "25",
    avatar: "../Picture/pilots/25.png",
    joinDate: "28 марта 2024",
    rank: "Senior Pilot",
    planes: ["Су-25Т"],
    role: "Штурмовик",
    flag: "../Picture/pilots/ru_flag.png"
  },
          
  {
    nick: "Zloy",
    name: "Михаил",
    number: "171",
    avatar: "../Picture/pilots/171.png",
    joinDate: "28 мая 2024",
    rank: "Senior Pilot",
    planes: ["F/A-18C Lot 20", "JF-17", "Ka-50 III"],
    role: "Универсал",
    flag: "../Picture/pilots/ru_flag.png"
  },
            
  {
    nick: "Տẵłđẵŧ",
    name: "Дима",
    number: "201",
    avatar: "../Picture/pilots/201.png",
    joinDate: "2 апреля 2024",
    rank: "Pilot",
    planes: ["Су-25Т", "Миг-29А"],
    role: "Штурмовик - Истребитель",
    flag: "../Picture/pilots/ru_flag.png"
  },

  {
    nick: "Metal_D",
    name: "Даниель",
    number: "777",
    avatar: "../Picture/pilots/Dis.png",
    joinDate: "28 марта 2024",
    rank: "Senior Pilot",
    planes: ["Су-25Т", "C-130J-30"],
    role: "Штурмовик",
    flag: "../Picture/pilots/ru_flag.png"
  },

  {
    nick: "Answan14",
    name: "Андрей",
    number: "14",
    avatar: "../Picture/pilots/14.png",
    joinDate: "2 мая 2025",
    rank: "Pilot",
    planes: ["F-16C", "F/A-18C Lot 20"],
    role: "Штурмовик - Истребитель",
    flag: "../Picture/pilots/ru_flag.png"
  },

  {
    nick: "4ekan",
    name: "Виктор",
    number: "228",
    avatar: "../Picture/pilots/228.png",
    joinDate: "30 мая 2025",
    rank: "Pilot",
    planes: ["Su-27","Миг-29A 9-12","F-15E"],
    role: "Штурмовик - Истребитель",
    flag: "../Picture/pilots/ru_flag.png"
  },
  
  {
    nick: "Пирог",
    name: "Кирилл",
    number: "73",
    avatar: "../Picture/pilots/73.png",
    joinDate: "11 июня 2025",
    rank: "Cadet",
    planes: ["F-14A/B", "Ka-50 III"],
    role: "Штурмовик - Истребитель",
    flag: "../Picture/pilots/ru_flag.png"
  },

  {
    nick: "Kaze",
    name: "Константин",
    number: "117",
    avatar: "../Picture/pilots/117.png",
    joinDate: "8 Июля 2025",
    rank: "Cadet",
    planes: ["F-14A/B"],
    role: "Истребитель",
    flag: "../Picture/pilots/ru_flag.png"
  },

  {
    nick: "jink",
    name: "Дмитрий",
    number: "18",
    avatar: "../Picture/pilots/18.png",
    joinDate: "7 марта 2025",
    rank: "Senior Pilot",
    planes: ["F/A-18C Lot 20"],
    role: "Истребитель",
    flag: "../Picture/pilots/ru_flag.png"
  },

  {
    nick: "Noga",
    name: "Владимир",
    number: "148",
    avatar: "../Picture/pilots/148.png",
    joinDate: "23 август 2025",
    rank: "Cadet",
    planes: ["F-16C", "A-10C II"],
    role: "Штурмовик - Истребитель",
    flag: "../Picture/pilots/ru_flag.png"
  },

  {
    nick: "Lated",
    name: "Илья",
    number: "169",
    avatar: "../Picture/pilots/169.png",
    joinDate: "31 август 2025",
    rank: "Senior Pilot",
    planes: ["F-15E", "Миг-29A 9-12", "F-4E"],
    role: "Штурмовик - Истребитель",
    flag: "../Picture/pilots/ru_flag.png"
  },

  {
    nick: "Spot",
    name: "Сергей",
    number: "202",
    avatar: "../Picture/pilots/Dis.png",
    joinDate: "27 сентября 2025",
    rank: "Pilot",
    planes: ["F/A-18C Lot 20"],
    role: "Истребитель",
    flag: "../Picture/pilots/be_flag.png"
  },

  {
    nick: "Вазик",
    name: "Александр",
    number: "217",
    avatar: "../Picture/pilots/217.png",
    joinDate: "4 октября 2025",
    rank: "Cadet",
    planes: ["F/A-18C Lot 20", "F-16C","Ka-50 III"],
    role: "Универсал",
    flag: "../Picture/pilots/ru_flag.png"
  },

  {
    nick: "iceberg",
    name: "Владимир",
    number: "122",
    avatar: "../Picture/pilots/122.png",
    joinDate: "12 октября 2025",
    rank: "Cadet",
    planes: ["F-4E", "F/A-18C Lot 20", "A-10C II"],
    role: "Штурмовик - Истребитель",
    flag: "../Picture/pilots/ru_flag.png"
  },

  {
    nick: "Soul",
    name: "Никита",
    number: "185",
    avatar: "../Picture/pilots/185.png",
    joinDate: "13 октября 2025",
    rank: "Pilot",
    planes: ["F/A-18C Lot 20","F-16C"],
    role: "Штурмовик - Истребитель",
    flag: "../Picture/pilots/ru_flag.png"
  },

  {
    nick: "Rudy",
    name: "Артемий",
    number: "140",
    avatar: "../Picture/pilots/Dis.png",
    joinDate: "9 ноября 2025",
    rank: "Cadet",
    planes: ["F/A-18C Lot 20"],
    role: "Штурмовик",
    flag: "../Picture/pilots/ru_flag.png"
  },

  {
    nick: "high beast",
    name: "Дмитрий",
    number: "69",
    avatar: "../Picture/pilots/069.png",
    joinDate: "21 ноября 2025",
    rank: "Cadet",
    planes: ["F/A-18C Lot 20"],
    role: "Истребитель",
    flag: "../Picture/pilots/ru_flag.png"
  },

  {
    nick: "Third",
    name: "Антон",
    number: "333",
    avatar: "../Picture/pilots/333.png",
    joinDate: "13 декабря 2025",
    rank: "Pilot",
    planes: ["F-4E","F-14A/B"],
    role: "Штурмовик - Истребитель",
    flag: "../Picture/pilots/ru_flag.png"
  },

  {
    nick: "inteR",
    name: "Сергей",
    number: "200",
    avatar: "../Picture/pilots/200.png",
    joinDate: "15 января 2026",
    rank: "Senior Pilot",
    planes: ["CH-47F","OH-58D"],
    role: "Вертолетчик",
    flag: "../Picture/pilots/ge_flag.png"
  },

  {
    nick: "Hunter",
    name: "Дмитрий",
    number: "279",
    avatar: "../Picture/pilots/Dis.png",
    joinDate: "20 января 2026",
    rank: "Cadet",
    planes: ["F/A-18C Lot 20","AH-64D Apache"],
    role: "Штурмовик",
    flag: "../Picture/pilots/ru_flag.png"
  },

  {
    nick: "Kaiten",
    name: "Олег",
    number: "137",
    avatar: "../Picture/pilots/137.png",
    joinDate: "21 января 2026",
    rank: "Cadet",
    planes: ["F/A-18 Lot 20"],
    role: "Штурмовик - Истребитель",
    flag: "../Picture/pilots/ru_flag.png"
  },

  {
    nick: "Petuss",
    name: "Пётр",
    number: "669",
    avatar: "../Picture/pilots/Dis.png",
    joinDate: "18 марта 2026",
    rank: "Cadet",
    planes: ["AH-64D","F-16C","F/A-18C Lot 20"],
    role: "Штурмовик",
    flag: "../Picture/pilots/ru_flag.png"
  },

  {
    nick: "Waffel",
    name: "Егор",
    number: "177",
    avatar: "../Picture/pilots/177.png",
    joinDate: "30 марта 2026",
    rank: "Cadet",
    planes: ["F-16C","F/A-18C Lot 20"],
    role: "Штурмовик",
    flag: "../Picture/pilots/sw_flag.png"
  },
];