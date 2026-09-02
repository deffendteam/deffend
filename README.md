<p align="center">
  <img src="https://readme-typing-svg.demolab.com?font=Fira+Code&weight=600&size=28&duration=3000&pause=500&color=00FF00&center=true&vCenter=true&multiline=true&width=800&height=100&lines=TEAM+DEFEND+KERAS;CYBER+SECURITY+%7C+ETHICAL+HACKING;WE+DEFEND+THE+DIGITAL+REALM" alt="Typing SVG" />
</p>

---

```python
#!/usr/bin/env python3
# -*- coding: utf-8 -*-

"""
TEAM DEFEND KERAS
-----------------
Misi: Menjaga keamanan siber dengan integritas dan keahlian.
Kami adalah perisai di tengah badai digital.
"""

class TeamDefendKeras:
    def __init__(self):
        self.name = "Team Defend Keras"
        self.motto = "Defend with Honor, Attack with Knowledge"
        self.members = ["Ahli Keamanan", "Ethical Hacker", "Forensic Analyst"]
        self.status = "ACTIVE & VIGILANT"

    def intro(self):
        return f"""
        ===========================================
        {self.name}
        {self.motto}
        Status: {self.status}
        Anggota: {', '.join(self.members)}
        ===========================================
        """

    def defend(self, threat):
        return f"[+] Mempertahankan sistem dari {threat}..."

    def attack(self, target):
        return f"[+] Menguji keamanan {target} secara etis..."

# Inisialisasi
tdk = TeamDefendKeras()
print(tdk.intro())
print(tdk.defend("Malware"))
print(tdk.attack("Server Internal"))
