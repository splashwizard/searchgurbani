function getNanakshahi()
{var now=new Date();var today=new Date(now.getYear(),now.getMonth(),now.getDate());var yearNow=now.getYear();var monthNow=now.getMonth();var dateNow=now.getDate();switch(monthNow+1){case 1:if(dateNow<13)
{S_month=10;S_date=31-(13-dateNow);}
else
{S_month=11;S_date=dateNow-12;}
S_Year=yearNow-1469;break;case 2:if(dateNow<12)
{S_month=11;S_date=31-(12-dateNow);}
else
{S_month=12;S_date=dateNow-11;}
S_Year=yearNow-1469;break;case 3:if(dateNow<14)
{S_month=12;S_date=31-(14-dateNow);S_Year=yearNow-1469;}
else
{S_month=1;S_date=dateNow-13;S_Year=yearNow-1468;}
break;case 4:if(dateNow<14)
{S_month=1;S_date=32-(14-dateNow);}
else
{S_month=2;S_date=dateNow-13;}
S_Year=yearNow-1468;break;case 5:if(dateNow<15)
{S_month=2;S_date=32-(15-dateNow);}
else
{S_month=3;S_date=dateNow-14;}
S_Year=yearNow-1468;break;case 6:if(dateNow<15)
{S_month=3;S_date=32-(15-dateNow);}
else
{S_month=4;S_date=dateNow-14;}
S_Year=yearNow-1468;break;case 7:if(dateNow<16)
{S_month=4;S_date=32-(16-dateNow);}
else
{S_month=5;S_date=dateNow-15;}
S_Year=yearNow-1468;break;case 8:if(dateNow<16)
{S_month=5;S_date=32-(16-dateNow);}
else
{S_month=6;S_date=dateNow-15;}
S_Year=yearNow-1468;break;case 9:if(dateNow<15)
{S_month=6;S_date=31-(15-dateNow);}
else
{S_month=7;S_date=dateNow-14;}
S_Year=yearNow-1468;break;case 10:if(dateNow<15)
{S_month=7;S_date=31-(15-dateNow);}
else
{S_month=8;S_date=dateNow-14;}
S_Year=yearNow-1468;break;case 11:if(dateNow<14)
{S_month=8;S_date=31-(14-dateNow);}
else
{S_month=9;S_date=dateNow-13;}
S_Year=yearNow-1468;break;case 12:if(dateNow<14)
{S_month=9;S_date=31-(14-dateNow)}
else
{S_month=10;S_date=dateNow-13}
S_Year=yearNow-1468;break;}
var S_monNames=new
Array("Chet","Vaisakh","Jeth","Harh","Sawan","Bhadon","Asu","Katik","Maghar","Poh","Magh","Phagan");return""+S_monNames[S_month-1]+" "+S_date+", Samvat "+S_Year+"  N&#257;naksh&#257;h&#299;"}
function getNanakshahi_Date()
{var now=new Date();var today=new Date(now.getYear(),now.getMonth(),now.getDate());var yearNow=now.getYear();var monthNow=now.getMonth();var dateNow=now.getDate();switch(monthNow+1){case 1:if(dateNow<13)
{S_month=10;S_date=31-(13-dateNow);}
else
{S_month=11;S_date=dateNow-12;}
S_Year=yearNow-1469;break;case 2:if(dateNow<12)
{S_month=11;S_date=31-(12-dateNow);}
else
{S_month=12;S_date=dateNow-11;}
S_Year=yearNow-1469;break;case 3:if(dateNow<14)
{S_month=12;S_date=31-(14-dateNow);S_Year=yearNow-1469;}
else
{S_month=1;S_date=dateNow-13;S_Year=yearNow-1468;}
break;case 4:if(dateNow<14)
{S_month=1;S_date=32-(14-dateNow);}
else
{S_month=2;S_date=dateNow-13;}
S_Year=yearNow-1468;break;case 5:if(dateNow<15)
{S_month=2;S_date=32-(15-dateNow);}
else
{S_month=3;S_date=dateNow-14;}
S_Year=yearNow-1468;break;case 6:if(dateNow<15)
{S_month=3;S_date=32-(15-dateNow);}
else
{S_month=4;S_date=dateNow-14;}
S_Year=yearNow-1468;break;case 7:if(dateNow<16)
{S_month=4;S_date=32-(16-dateNow);}
else
{S_month=5;S_date=dateNow-15;}
S_Year=yearNow-1468;break;case 8:if(dateNow<16)
{S_month=5;S_date=32-(16-dateNow);}
else
{S_month=6;S_date=dateNow-15;}
S_Year=yearNow-1468;break;case 9:if(dateNow<15)
{S_month=6;S_date=31-(15-dateNow);}
else
{S_month=7;S_date=dateNow-14;}
S_Year=yearNow-1468;break;case 10:if(dateNow<15)
{S_month=7;S_date=31-(15-dateNow);}
else
{S_month=8;S_date=dateNow-14;}
S_Year=yearNow-1468;break;case 11:if(dateNow<14)
{S_month=8;S_date=31-(14-dateNow);}
else
{S_month=9;S_date=dateNow-13;}
S_Year=yearNow-1468;break;case 12:if(dateNow<14)
{S_month=9;S_date=31-(14-dateNow)}
else
{S_month=10;S_date=dateNow-13}
S_Year=yearNow-1468;break;}
var S_monNames=new
Array("Chet","Vaisakh","Jeth","Harh","Sawan","Bhadon","Asu","Katik","Maghar","Poh","Magh","Phagan");return" "+S_monNames[S_month-1]+" "+S_date+", "+S_Year}
function getNanakshahi_Year()
{var now=new Date();var today=new Date(now.getYear(),now.getMonth(),now.getDate());var yearNow=now.getYear();var monthNow=now.getMonth();var dateNow=now.getDate();switch(monthNow+1){case 1:if(dateNow<13)
{S_month=10;S_date=31-(13-dateNow);}
else
{S_month=11;S_date=dateNow-12;}
S_Year=yearNow-1469;break;case 2:if(dateNow<12)
{S_month=11;S_date=31-(12-dateNow);}
else
{S_month=12;S_date=dateNow-11;}
S_Year=yearNow-1469;break;case 3:if(dateNow<14)
{S_month=12;S_date=31-(14-dateNow);S_Year=yearNow-1469;}
else
{S_month=1;S_date=dateNow-13;S_Year=yearNow-1468;}
break;case 4:if(dateNow<14)
{S_month=1;S_date=32-(14-dateNow);}
else
{S_month=2;S_date=dateNow-13;}
S_Year=yearNow-1468;break;case 5:if(dateNow<15)
{S_month=2;S_date=32-(15-dateNow);}
else
{S_month=3;S_date=dateNow-14;}
S_Year=yearNow-1468;break;case 6:if(dateNow<15)
{S_month=3;S_date=32-(15-dateNow);}
else
{S_month=4;S_date=dateNow-14;}
S_Year=yearNow-1468;break;case 7:if(dateNow<16)
{S_month=4;S_date=32-(16-dateNow);}
else
{S_month=5;S_date=dateNow-15;}
S_Year=yearNow-1468;break;case 8:if(dateNow<16)
{S_month=5;S_date=32-(16-dateNow);}
else
{S_month=6;S_date=dateNow-15;}
S_Year=yearNow-1468;break;case 9:if(dateNow<15)
{S_month=6;S_date=31-(15-dateNow);}
else
{S_month=7;S_date=dateNow-14;}
S_Year=yearNow-1468;break;case 10:if(dateNow<15)
{S_month=7;S_date=31-(15-dateNow);}
else
{S_month=8;S_date=dateNow-14;}
S_Year=yearNow-1468;break;case 11:if(dateNow<14)
{S_month=8;S_date=31-(14-dateNow);}
else
{S_month=9;S_date=dateNow-13;}
S_Year=yearNow-1468;break;case 12:if(dateNow<14)
{S_month=9;S_date=31-(14-dateNow)}
else
{S_month=10;S_date=dateNow-13}
S_Year=yearNow-1468;break;}
var S_monNames=new
Array("Chet","Vaisakh","Jeth","Harh","Sawan","Bhadon","Asu","Katik","Maghar","Poh","Magh","Phagan");return" "+S_monNames[S_month-1]+" "+S_date+", "+S_Year}