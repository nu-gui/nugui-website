# Audio Setup Instructions

## Required Audio Files

Based on the AI Music Brief, you need to create/generate the following audio files:

### 1. Main Ambient Sound
**Filename:** `nugui-ambient-sound.mp3` and `nugui-ambient-sound.wav`
- Duration: 30 seconds with seamless loop point at 25 seconds
- Style: Ambient Electronic / Corporate Futurism
- BPM: 72-80
- Key: C Major or A Minor

### 2. Landing Page Electric Tone (Optional - can use same file)
**Filename:** `electric-relaxed-tone.mp3` and `electric-relaxed-tone.wav`
- Can be the same file as above or a variation
- Used specifically on the landing page

## How to Generate the Audio

### Option 1: AI Music Generators
Use the AI_MUSIC_BRIEF.md file with these services:
- **Suno AI** (https://suno.ai)
- **Mubert** (https://mubert.com)
- **AIVA** (https://aiva.ai)
- **Soundraw** (https://soundraw.io)

### Option 2: Free Music Libraries
Search for royalty-free ambient corporate music:
- **Pixabay Music** (https://pixabay.com/music/)
- **Free Music Archive** (https://freemusicarchive.org)
- **YouTube Audio Library** (https://studio.youtube.com)

Search terms:
- "ambient corporate"
- "technology background"
- "minimal electronic"
- "business ambient"

### Option 3: Create with DAW
Use free software like:
- **GarageBand** (Mac)
- **Reaper** (60-day trial)
- **FL Studio** (trial)
- **Audacity** (for editing)

## File Placement

Place the generated files in:
```
/public/assets/sounds/
├── nugui-ambient-sound.mp3     (main file)
├── nugui-ambient-sound.wav     (fallback)
├── electric-relaxed-tone.mp3   (landing page)
└── electric-relaxed-tone.wav   (landing page fallback)
```

## Audio Specifications

### Technical Requirements:
- Sample Rate: 48kHz (44.1kHz acceptable)
- Bit Depth: 24-bit (16-bit acceptable)
- Format: MP3 (320kbps) and WAV
- Loudness: -14 LUFS
- True Peak: -1dBFS maximum

### Loop Requirements:
- Must loop seamlessly
- Loop point at 25 seconds
- Fade out at 29-30 seconds for smooth restart

## Testing the Audio

1. **Test Loop**: Play the file on repeat to ensure smooth looping
2. **Volume Test**: Check at different volume levels (10%, 20%, 30%)
3. **Browser Test**: Test in Chrome, Firefox, Safari, Edge
4. **Mobile Test**: Test on mobile devices

## Volume Levels (Configured in Code)

The audio controller is configured with these volume levels:
- Landing Page: 30%
- General Browsing: 15%
- Product Demos: 25%
- Video Content: 10%
- Muted: 0%

## Implementation Status

✅ Audio controller implemented (`/js/audio-controller.js`)
✅ Landing page audio setup
✅ Header audio controls added
✅ Volume management system
✅ Persistent playback across pages
✅ Theme switcher integrated

## Quick Test

Once you've added the audio files:

1. Visit the landing page (`/`)
2. Audio should play automatically (if browser allows)
3. Click audio icon in header to toggle
4. Navigate to other pages - audio continues
5. Volume automatically adjusts based on context

## Troubleshooting

### Audio not playing?
- Check browser autoplay policies
- Ensure files are in correct location
- Verify file formats (MP3 and WAV)
- Check browser console for errors

### Loop not seamless?
- Use audio editor to ensure clean loop point
- Add small crossfade at loop point
- Test in multiple browsers

### Volume too loud/soft?
- Adjust in audio-controller.js volumeLevels object
- Ensure audio file is normalized to -14 LUFS