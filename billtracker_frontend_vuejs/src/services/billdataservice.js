
import axios from 'axios'
import configs from "./config"
class billdataservice {



  async deletebill(id) {
    const toke = "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiYTQwYTM1ODg5MmU2MWM4ZjNjYzRhNzI1YjQzOTVlMjEzMWJiNWI3NDFmYjQzMWMzYmU2ZTdjMTRmOGZmYjU3ODE3NWQzZGNlNWRlMTdlNTYiLCJpYXQiOjE2Mjg0MDU1MzcsIm5iZiI6MTYyODQwNTUzNywiZXhwIjoxNjU5OTQxNTM3LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.o5sBufXxuKUu7AiU8LVTIVrqCMCdpIsEvv31d0PXsNr8oM7QW18ZYwYDkCLycVaCB8Qy6hK4Hf8V5y_yCQTYJ2PSt4e2TYO6LfqE_bmpbBeZeZI2plrHDMJq3SV86zWuh__WVu4sFsrD2McJuWZCA3DDRQBWzGiA-WOsb1qqRXCU7pw8KPjpVeGDa5Zl7KFgWohi7cn7lOZ-5CnfVL7pg8Sd8Njx4VZ7reM4SjcKlTtS3OS8xUHBt5uDMrkWO5NxureKoAvSQGH-DnlpSFO0gnj4D6xYgE4tpTO-PWr38B9M0A45oCo4L384h4tnG8WUiU3N3AsG4GCIwK_1U3x8_CszET8jN6ii5ez7nopirNyExeeSHnBCYGkqy9Q7PJBObP1qk-7rACmCZnz3FGudFqnNqcMv0OENQuwTnVcxeN3CSpp9DrvRAXroC4vyATNUCtzmugK-DIY_BH3apdFI-Y-L4sbXCxXLOtIPVxTjqnHWUf-BNcMGnltGhxKkugKN4xtgnD_dM9nd5Hhe0ZBp-lKIJBIBkevm2ypyGBXmutjHJ0U-dzkCbSiFC0CRIzhHZNsDVAn0VqBrGUZiC2OIAwa1_qkPhquTcKXdzHKQhiAClBGddW9HQnVnFpWtZbAGm1Hc-pspt4hqtDRAe82vtkF7M-nKQ-LrSu8i5_fRCcc";
    const res = await axios((configs.appurl)+`/bill/delete/` + id,
      {
        method: 'GET',
        mode: 'no-cors',
        credentials: 'same-origin',
        headers:
        {
          "Authorization": `Bearer ${toke}`,
          'Access-Control-Allow-Origin': '*',
          'Content-Type': 'application/json',
        }
      })

    return res.data;
  }

  async showbill(id) {
 
    const toke = "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiYTQwYTM1ODg5MmU2MWM4ZjNjYzRhNzI1YjQzOTVlMjEzMWJiNWI3NDFmYjQzMWMzYmU2ZTdjMTRmOGZmYjU3ODE3NWQzZGNlNWRlMTdlNTYiLCJpYXQiOjE2Mjg0MDU1MzcsIm5iZiI6MTYyODQwNTUzNywiZXhwIjoxNjU5OTQxNTM3LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.o5sBufXxuKUu7AiU8LVTIVrqCMCdpIsEvv31d0PXsNr8oM7QW18ZYwYDkCLycVaCB8Qy6hK4Hf8V5y_yCQTYJ2PSt4e2TYO6LfqE_bmpbBeZeZI2plrHDMJq3SV86zWuh__WVu4sFsrD2McJuWZCA3DDRQBWzGiA-WOsb1qqRXCU7pw8KPjpVeGDa5Zl7KFgWohi7cn7lOZ-5CnfVL7pg8Sd8Njx4VZ7reM4SjcKlTtS3OS8xUHBt5uDMrkWO5NxureKoAvSQGH-DnlpSFO0gnj4D6xYgE4tpTO-PWr38B9M0A45oCo4L384h4tnG8WUiU3N3AsG4GCIwK_1U3x8_CszET8jN6ii5ez7nopirNyExeeSHnBCYGkqy9Q7PJBObP1qk-7rACmCZnz3FGudFqnNqcMv0OENQuwTnVcxeN3CSpp9DrvRAXroC4vyATNUCtzmugK-DIY_BH3apdFI-Y-L4sbXCxXLOtIPVxTjqnHWUf-BNcMGnltGhxKkugKN4xtgnD_dM9nd5Hhe0ZBp-lKIJBIBkevm2ypyGBXmutjHJ0U-dzkCbSiFC0CRIzhHZNsDVAn0VqBrGUZiC2OIAwa1_qkPhquTcKXdzHKQhiAClBGddW9HQnVnFpWtZbAGm1Hc-pspt4hqtDRAe82vtkF7M-nKQ-LrSu8i5_fRCcc";
    const res = await axios((configs.appurl)+`/bill/show/`+id,
      {
        method: 'GET',
        mode: 'no-cors',
        credentials: 'same-origin',
        headers:
        {
          "Authorization": `Bearer ${toke}`,
          'Access-Control-Allow-Origin': '*',
          'Content-Type': 'application/json',
        }
      })
 // console.log(res.data)
    return res.data;
  }

  async showallbill(userid) {
    const toke = "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiYTQwYTM1ODg5MmU2MWM4ZjNjYzRhNzI1YjQzOTVlMjEzMWJiNWI3NDFmYjQzMWMzYmU2ZTdjMTRmOGZmYjU3ODE3NWQzZGNlNWRlMTdlNTYiLCJpYXQiOjE2Mjg0MDU1MzcsIm5iZiI6MTYyODQwNTUzNywiZXhwIjoxNjU5OTQxNTM3LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.o5sBufXxuKUu7AiU8LVTIVrqCMCdpIsEvv31d0PXsNr8oM7QW18ZYwYDkCLycVaCB8Qy6hK4Hf8V5y_yCQTYJ2PSt4e2TYO6LfqE_bmpbBeZeZI2plrHDMJq3SV86zWuh__WVu4sFsrD2McJuWZCA3DDRQBWzGiA-WOsb1qqRXCU7pw8KPjpVeGDa5Zl7KFgWohi7cn7lOZ-5CnfVL7pg8Sd8Njx4VZ7reM4SjcKlTtS3OS8xUHBt5uDMrkWO5NxureKoAvSQGH-DnlpSFO0gnj4D6xYgE4tpTO-PWr38B9M0A45oCo4L384h4tnG8WUiU3N3AsG4GCIwK_1U3x8_CszET8jN6ii5ez7nopirNyExeeSHnBCYGkqy9Q7PJBObP1qk-7rACmCZnz3FGudFqnNqcMv0OENQuwTnVcxeN3CSpp9DrvRAXroC4vyATNUCtzmugK-DIY_BH3apdFI-Y-L4sbXCxXLOtIPVxTjqnHWUf-BNcMGnltGhxKkugKN4xtgnD_dM9nd5Hhe0ZBp-lKIJBIBkevm2ypyGBXmutjHJ0U-dzkCbSiFC0CRIzhHZNsDVAn0VqBrGUZiC2OIAwa1_qkPhquTcKXdzHKQhiAClBGddW9HQnVnFpWtZbAGm1Hc-pspt4hqtDRAe82vtkF7M-nKQ-LrSu8i5_fRCcc";
    const res = await axios((configs.appurl)+`/bill/showall/`+userid,
      {
        method: 'GET',
        mode: 'no-cors',
        credentials: 'same-origin',
        headers:
        {
          "Authorization": `Bearer ${toke}`,
          'Access-Control-Allow-Origin': '*',
          'Content-Type': 'application/json',
        }
      })

    return res.data;

  }
}
export default new billdataservice();