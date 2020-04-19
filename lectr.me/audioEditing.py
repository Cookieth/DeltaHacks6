import os
import argparse
from pydub import AudioSegment
from pydub.playback import play
from pydub.silence import split_on_silence
import pydub.audio_segment
import pydub.pyaudioop
from pydub.effects import speedup

parser = argparse.ArgumentParser()
parser.add_argument("filename", help = "What is the name of the file with the .mp3 extension")
parser.add_argument("environment_sound", type = str, nargs='?', default="moderate", help = "How much background noise is there? [low,moderate,high]")
parser.add_argument("playback_speed", type = float, nargs='?', default=1.0, help = "How fast do you want to play the track? 0.5 is 50% speed")
args = parser.parse_args()


def audioInput(inFileName):
    sound = AudioSegment.from_file(inFileName, format="mp3")
    return sound

def playback_rate(track, speed=1.0):

    alteredFile = track._spawn(track.raw_data, overrides={
         "frame_rate": int(track.frame_rate * speed)
      })
    return alteredFile.set_frame_rate(track.frame_rate)


editFile = audioInput(args.filename)
minDB_silence = -20
num = 0

dBTable = {"low":-25,"moderate":-30,"high":-40}

output = split_on_silence(editFile, 250, dBTable[args.environment_sound], 100,seek_step=1)
try:
    outputFile = output[0]
    for a in range(1, len(output)):
        outputFile += output[a]
        #print(str(num))
        num+=1
except:
    outputFile = editFile

compression = int(100.0* round(1.0 - (float(len(outputFile))/float(len(editFile))),4))
#print("Trying with silence at " + str(minDB_silence) + "dB and the compression is " + str(compression))
exportFile = outputFile

if(args.playback_speed != 1):
    newExport = speedup(exportFile, args.playback_speed, 150, 25)
    newExport.export("Cut_"+ args.filename, format='mp3')
else:
    exportFile.export("Cut_"+ args.filename, format='mp3')

#print("Done. Cut_" + args.filename + " was cut down by " + str(compression) + "%")
print("Cut_"+ args.filename)
